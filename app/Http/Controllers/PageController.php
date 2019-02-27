<?php

namespace App\Http\Controllers;

use App\Notifications\CallRequest;
use App\Notifications\NewOrder;
use App\Notifications\NewOrderAdmin;
use App\Notifications\PaymentMail;
use App\deliverytype;
use Auth;
use Cart;
use DB;
use Epharma\Model\Address;
use Epharma\Model\Area;
use Epharma\Model\Callme;
use Epharma\Model\Category;
use Epharma\Model\DeliveryTime;
use Epharma\Model\District;
use Epharma\Model\Option;
use Epharma\Model\Order;
use Epharma\Model\OrderItems;
use Epharma\Model\Payment;
use Epharma\Model\Product;
use Epharma\Model\ProductAttr;
use Epharma\Model\ProductInquiry;
use Epharma\Model\ProductV;
use Epharma\Model\Reviews;
use Epharma\Model\User;
use Epharma\Model\UserAttr;
use Epharma\Model\Wishlist;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use PDF;
use Session;
use Theme;
use Validator;

class PageController extends Controller {

    use Notifiable;

    public function __construct()
    {
        $this->middleware('guest', ['only' => ['user_login']]); 
        $this->middleware('guest:admin', ['only' => ['login']])->except('logout');
    }

    public function index() {
        $data['categories'] = Category::with('media')->findMany(option('popular-category'));
//        $data['products'] = Product::with('media', 'categories')->take(10)->orderBy('products.id', 'DESC')->get();
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'));
//        return $data['featured_products'][0]->brandattrOptions->attributeValue->discount_percentage;
        $data['collections'] = Category::with('products', 'products.media', 'products.brandattrOptions.attributeValue')->findMany(option('collections'));
        $data['count'] = 0;
        $data;
        // return Theme::view('index', $data);
        return view('frontend.index', $data);
    }

    public function olddesign() {
        $data['categories'] = Category::with('media')->findMany(option('popular-category'));
//        $data['products'] = Product::with('media', 'categories')->take(10)->orderBy('products.id', 'DESC')->get();
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'));
//        return $data['featured_products'][0]->brandattrOptions->attributeValue->discount_percentage;
        $data['collections'] = Category::with('products', 'products.media', 'products.brandattrOptions.attributeValue')->findMany(option('collections'));
        return Theme::view('index', $data);

    }

    public function mail_body($id) {
//        $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($id);
        return $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($id);
        return view('layouts.epharma_invoice', $data);
    }

    public function product($slug) {
        $data['title'] = 'Product';
        $data['attributes'] = ProductAttr::with('attribute', 'attributeValue')
        ->where('product_id', $slug)->get();

        $data['product'] = Product::with('media', 'typeAttrOptions.attributeValue', 'packAttrOptions.attributeValue', 'genericAttrOptions.attributeValue', 'terms', 'brandattrOptions.attributeValue')
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->find($slug);
        $rating_count = Reviews::where(array('product_id' => $slug, 'status' => 1));
        $rating_avg = $rating_count->get();
        $data['rating_count'] = $rating_count->count();
        $avg = 0;
        $totalAvg = 0;
        foreach ($rating_avg as $key => $item) {
            $avg += $item->rating;
            $totalAvg += 5;
        }
        $data['ratingAvg'] = ($avg != 0) ? (( $avg / $totalAvg ) * 100) - 5 : 0;
        $data['totalRating'] = ($avg != 0) ? (( $avg / $totalAvg ) * $totalAvg) / $data['rating_count'] : 0;
        $review_data = Reviews::with('user')->where(array('product_id' => $slug, 'status' => 1))->get();
        if ($review_data->count() > 0) {
            foreach ($review_data as $key => $val) {
                $reviews[$key]['id'] = $val->id;
                $reviews[$key]['rating'] = (($val->rating / 5) * 100) - 1;
                $reviews[$key]['comment'] = $val->comment;
                $reviews[$key]['name'] = $val->user->name;
                $reviews[$key]['date'] = date("F j, Y", strtotime($val->created_at));
            }
            $data['reviews'] = $reviews;
        }
//        return $reviews;
        if ($data['product']->genericAttrOptions == '') {
            $genericId = $data['product']->typeAttrOptions->attributeValue->id;
        } else {
            $genericId = $data['product']->genericAttrOptions->attributeValue->id;
        }
        $data['generic_products'] = Product::with('typeAttrOptions.attributeValue', 'brandattrOptions.attributeValue')->whereHas(
            'attribute', function($query)use ($genericId) {
                $query->where('option_id', $genericId);
            }
        )->whereNotIn('products.id', [$data['product']->id])
        ->take(5)->get();


        $categories = $data['product']->categories()->pluck('id');
//        return $data['product']->id;
        $data['related_product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->whereHas(
            'categories', function($query)use ($categories) {
                $query->whereIn('term_id', $categories);
            }
        )->whereNotIn('products.id', [$data['product']->id])
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->take(10)->get();
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'))->take(6);
//        return $data;
        return Theme::view('product', $data);
    }

    public function newproductdesign($slug) {
        $data['title'] = 'Product';
        $data['attributes'] = ProductAttr::with('attribute', 'attributeValue')
        ->where('product_id', $slug)->get();

        $data['product'] = Product::with('media', 'typeAttrOptions.attributeValue', 'packAttrOptions.attributeValue', 'genericAttrOptions.attributeValue', 'terms', 'brandattrOptions.attributeValue')
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->find($slug);
        $rating_count = Reviews::where(array('product_id' => $slug, 'status' => 1));
        $rating_avg = $rating_count->get();
        $data['rating_count'] = $rating_count->count();
        $avg = 0;
        $totalAvg = 0;
        foreach ($rating_avg as $key => $item) {
            $avg += $item->rating;
            $totalAvg += 5;
        }
        $data['ratingAvg'] = ($avg != 0) ? (( $avg / $totalAvg ) * 100) - 5 : 0;
        $data['totalRating'] = ($avg != 0) ? (( $avg / $totalAvg ) * $totalAvg) / $data['rating_count'] : 0;
        $review_data = Reviews::with('user')->where(array('product_id' => $slug, 'status' => 1))->get();
        if ($review_data->count() > 0) {
            foreach ($review_data as $key => $val) {
                $reviews[$key]['id'] = $val->id;
                $reviews[$key]['rating'] = (($val->rating / 5) * 100) - 1;
                $reviews[$key]['comment'] = $val->comment;
                $reviews[$key]['name'] = $val->user->name;
                $reviews[$key]['date'] = date("F j, Y", strtotime($val->created_at));
            }
            $data['reviews'] = $reviews;
        }
//        return $reviews;
        if ($data['product']->genericAttrOptions == '') {
            $genericId = $data['product']->typeAttrOptions->attributeValue->id;
        } else {
            $genericId = $data['product']->genericAttrOptions->attributeValue->id;
        }
        $data['generic_products'] = Product::with('typeAttrOptions.attributeValue', 'brandattrOptions.attributeValue')->whereHas(
            'attribute', function($query)use ($genericId) {
                $query->where('option_id', $genericId);
            }
        )->whereNotIn('products.id', [$data['product']->id])
        ->take(5)->get();


        $categories = $data['product']->categories()->pluck('id');
//        return $data['product']->id;
        $data['related_product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->whereHas(
            'categories', function($query)use ($categories) {
                $query->whereIn('term_id', $categories);
            }
        )->whereNotIn('products.id', [$data['product']->id])
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->take(10)->get();
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'))->take(6);
//        return $data;
        return view('frontend.singleproduct', $data);
    }

    public function search_products(Request $request) {
//        return $request->text;
        $limit = $request->has('limit') ? $request->get('limit') : 12;

        $searchText = $request->text;
//        return Session::get('search');
        $data['searchText'] = $searchText;
        $result = Product::with('media', 'terms', 'attribute.attributeValue', 'brandattrOptions.attributeValue')
        ->where('name', 'like', '%' . $searchText . '%')
        ->where('is_available', 1)
        ->where('delete_status', 0)
        ->orderBy(DB::raw('abs(name),name'), 'asc')
        ->paginate(12);
        $result->appends(['text' => $searchText]);
        $data['products'] = $result;

        return Theme::view('search_products', $data);
    }

    public function add_reviews(Request $request) {
        $userId = Auth::id();
        $prodId = $request->p_id;
        $rating = $request->rating;
        $check_rating = Reviews::where(array('product_id' => $prodId, 'user_id' => $userId))->count();
        if ($check_rating == 0) {
            $rating_data = new Reviews;
        } else {
            $rating_data = Reviews::where(array('product_id' => $prodId, 'user_id' => $userId))->first();
        }
        $rating_data->user_id = $userId;
        $rating_data->product_id = $prodId;
        $rating_data->rating = $rating;
        $rating_data->status = 0;
        if ($rating_data->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add_comment(Request $request) {
        $userId = Auth::id();
        $prodId = $request->product_id;
        $comment = $request->review;
        $check_rating = Reviews::where(array('product_id' => $prodId, 'user_id' => $userId))->count();
        if ($check_rating == 0) {
            $review_data = new Reviews;
        } else {
            $review_data = Reviews::where(array('product_id' => $prodId, 'user_id' => $userId))->first();
        }
        $review_data->user_id = $userId;
        $review_data->product_id = $prodId;
        $review_data->comment = $comment;
        $review_data->status = 0;
        if ($review_data->save()) {
            return redirect()->back()->withErrors('Thanks for rate this product!');
        } else {
            return redirect()->back()->withErrors('Sorry there is an error!');
        }
    }

    public function category($slug, Request $request) {
        $limit = $request->has('limit') ? $request->get('limit') : 12;
        $short = $request->has('short-by') ? $request->get('short-by') : 'id';
//        $offset = $request->has('offset') ? $request->get('offset') : 0;
        $data['category'] = Category::find($slug);
//        return $data['category'];
        if ($data['category']->parent != 0) {
            $parCat = $data['category']->parent;
        } else {
            $parCat = $data['category']->id;
        }
        $data['subCategory'] = Category::where('parent', $parCat)->orderBy('name', 'ASC')->get();


        $data['catProduct'] = Product::with('terms', 'media', 'brandattrOptions.attributeValue', 'genericAttrOptions.attributeValue')
        ->whereHas('categories', function($query)use ($slug) {
            $query->where('term_id', $slug);
        })
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->orderBy('products' . '.' . $short, 'ASC')
        ->paginate($limit);

        return Theme::view('category', $data);
    }

    public function newcategory($slug, Request $request) {
        $limit = $request->has('limit') ? $request->get('limit') : 12;
        $short = $request->has('short-by') ? $request->get('short-by') : 'id';
//        $offset = $request->has('offset') ? $request->get('offset') : 0;
        $data['category'] = Category::find($slug);
//        return $data['category'];
        if ($data['category']->parent != 0) {
            $parCat = $data['category']->parent;
        } else {
            $parCat = $data['category']->id;
        }
        $data['subCategory'] = Category::where('parent', $parCat)->orderBy('name', 'ASC')->get();

        $data['catProduct'] = Product::with('terms', 'media', 'brandattrOptions.attributeValue', 'genericAttrOptions.attributeValue')
        ->whereHas('categories', function($query)use ($slug) {
            $query->where('term_id', $slug);
        })
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->orderBy('products' . '.' . $short, 'ASC')
        ->paginate($limit);

        return view('frontend.category', $data);
    }

    public function check_stock(Request $request) {
        $proId = $request->id;
        $product = Product::find($proId);
        return $product->is_available;
    }

    public function setdefault($id) {

     $default = Address::find($id);
     $default->defaultaddress ='true';
     $default->save();

     $all=Address::all()->whereNotIn('id', $default->id);
     foreach ($all as $address) {
       $address->defaultaddress='false';
       $address->save();
   }

   return back();

}


public function addToCart(Request $request) {
    $product = Product::with('media')->find($request->id);

    $option = [];
    if ($product->media->isNotEmpty()) {
        $option['img'] = $product->media->first()->src;
    }
    $option['productPrice'] = $product->price;

    $option['minQty'] = $product->min_quantity;

    $productPrice = $request->price;

    Cart::add($product->id, $product->name, $request->qty, $productPrice, $option);
    $sum = 0;
    foreach (Cart::content() as $item) {
        $sum += $item->options->productPrice * $item->qty;
    }
    $data['originalTotal'] = $sum;
    $data['count'] = Cart::count();
    $data['total'] = Cart::total();
    $data['content'] = Cart::content();
    return $data;
    return Theme::view('cart_ajax');
}

public function removeCartItem(Request $request) {
    Cart::remove($request->rowId);
    $sum = 0;
    foreach (Cart::content() as $item) {
        $sum += $item->options->productPrice * $item->qty;
    }
    $data['originalTotal'] = $sum;
    $data['count'] = Cart::count();
    $data['total'] = Cart::total();
    return $data;
    return Theme::view('cart_ajax');
}

public function removeFromWishlist(Request $request) {
    Wishlist::where(['user_id' => Auth::id(), 'product_id' => $request->rowId])->delete();
}

public function updateCartItem(Request $request) {
//        $items = array_combine($request->rowId, $request->qty);
    $rowId = $request->rowId;
    $qty = $request->qty;
    $aa = Cart::get($rowId);
    $minqty = $aa->options->minQty;
    if ($qty < $minqty) {
        $sum = 0;
        foreach (Cart::content() as $item) {
            $sum += $item->options->productPrice * $item->qty;
        }
        $data['originalTotal'] = $sum;
        $data['count'] = Cart::count();
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
        $data['fail'] = 1;
        return $data;
    } else {
        Cart::update($rowId, $qty);
        $sum = 0;
        foreach (Cart::content() as $item) {
            $sum += $item->options->productPrice * $item->qty;
        }
        $data['originalTotal'] = $sum;
        $data['count'] = Cart::count();
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
        $data['fail'] = 0;
        return $data;
    }

//        foreach ($items as $rowId => $qty) {
//            Cart::update($rowId, $qty);
//        }
}

public function cart() {
    $data['featured_products'] = Product::with('media')->findMany(option('featured-product'));
    return Theme::view('cart', $data);
}

public function destroyCart() {
    Cart::destroy();
}

public function quickView($id) {
    $data['attributes'] = ProductAttr::with('attribute', 'attributeValue')
    ->where('product_id', $id)->get();
    $data['product'] = Product::with('media')->find($id);
    return Theme::view('popup', $data);
}

public function checkout() {
//        return Cart::total();
    if (Auth::check()) {
        $userId = Auth::user()->id;



        $shipping = Option::get();
        $data['product'] = Product::with('media', 'typeAttrOptions.attributeValue', 'packAttrOptions.attributeValue', 'genericAttrOptions.attributeValue', 'terms', 'brandattrOptions.attributeValue')
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->find(1);
        $data['delivery_time'] = DeliveryTime::select('delivery_time')->get();
        $categories = $data['product']->categories()->pluck('id');
        $data['related_product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->whereHas(
            'categories', function($query)use ($categories) {
                $query->whereIn('term_id', $categories);
            }
        )->whereNotIn('products.id', [$data['product']->id])
        ->where('products.is_available', 1)
        ->where('products.delete_status', 0)
        ->take(10)->get();
        $data['district'] = District::pluck('name', 'id');
        $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
        $data['freeShip'] = $shipping[5]->value;
        $data['address'] = Address::where('user_id',$userId)->where('defaultaddress','true')->first();

        $data['deliverytypes'] =  deliverytype::all();
        $data['regular'] =  deliverytype::first()->price;
        $data['user_info'] = User::with('address')->find($userId);
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'));
//        return $data['user_info']->address[0];
        return Theme::view('checkout', $data);
    } else {
       $data['product'] = Product::with('media', 'typeAttrOptions.attributeValue', 'packAttrOptions.attributeValue', 'genericAttrOptions.attributeValue', 'terms', 'brandattrOptions.attributeValue')
       ->where('products.is_available', 1)
       ->where('products.delete_status', 0)
       ->find(1);
       $categories = $data['product']->categories()->pluck('id');
       $data['related_product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->whereHas(
        'categories', function($query)use ($categories) {
            $query->whereIn('term_id', $categories);
        }
    )->whereNotIn('products.id', [$data['product']->id])
       ->where('products.is_available', 1)
       ->where('products.delete_status', 0)
       ->take(10)->get();
       $shipping = Option::get();
       $data['delivery_time'] = DeliveryTime::select('delivery_time')->get();
       $data['district'] = District::pluck('name', 'id');
       $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
       $data['deliverytypes'] =  deliverytype::all();
       $data['freeShip'] = $shipping[5]->value;
       $data['regular'] =  deliverytype::first()->price;

       return Theme::view('checkout', $data);
   }
//        $data['district'] = District::pluck('name', 'id');
//        return Theme::view('checkout', $data);
}

public function check_shipping() {
    $shipping = Option::get();
    return $shipping[5]->value;
}

public function saveCheckout(Request $request) {
//        return $request->billing['pickup_time'];
//        return $request->payment_method;
//        return $request->billing['district'];
    $this->validate($request, [
        'billing.firstname' => 'required',
        'billing.district' => 'required',
        'billing.mobile' => 'required',
        'billing.address' => 'required',
    ]);

    if (Auth::check()) {
        $userId = Auth::user()->id;
    } else {
        if (isset($request->billing['register_account'])) {
            $email = $request->billing['email'];
            $checkEmail = User::where('email', $email)->count();
            if ($checkEmail == 0) {
                $user = new User;
                $user->name = $request->billing['firstname'];
                $user->email = $request->billing['email'];
                $user->mobile = $request->billing['mobile'];
                $user->password = bcrypt($request->billing['customer_password']);
                $user->status = 1;
                $user->save();

                $userId = $user->id;

                    //login user
                Auth::login($user);

            } else {
                $return = ['error' => ['You are already a registered member!']];
                return response($return, 422);
            }
        } else {
            $userId = NULL;
        }
    }

        //Billing Function add or update
    $addressRecord = Address::where('user_id', $userId);

    if (!($userId == NULL) && ($addressRecord->count() > 0)) {
        $billing = $addressRecord->first();
    } else {
        $billing = new Address;
    }
    $billing->user_id = isset($userId) ? $userId : NULL;
    $billing->name = $request->billing['firstname'];
    $billing->email = $request->billing['email'];
    $billing->address = $request->billing['address'];
    $billing->country = 'Bangladesh';
    $billing->district = $request->billing['district'];
    $billing->area = $request->billing['area'];
    $billing->mobile = $request->billing['mobile'];
//        $billing->phone = isset($request->billing['telephone']) ? $request->billing['telephone'] : NULL;
    $billing->save();



        //Shipping Function add or update
    if (isset($request->shipping['same_as_billing'])) {
        if (($userId == NULL) || ($addressRecord->count() > 1)) {
            $shipping = $addressRecord->skip(1)->first();
        } else {
            $shipping = new Address;
        }
        $shipping->user_id = isset($userId) ? $userId : NULL;
        $shipping->name = $request->shipping['firstname'];
        $shipping->email = $request->shipping['email'];
        $shipping->address = $request->shipping['address'];
        $shipping->country = 'Bangladesh';
        $shipping->district = $request->shipping['district'];
        $shipping->area = $request->shipping['area'];
        $shipping->mobile = $request->shipping['mobile'];
        $shipping->save();
        $shippingId = $shipping->id;
    } else {
        $shippingId = $billing->id;
    }

//        foreach ($request->get('billing') as $key => $value) {
//            if ($value) {
//                $userAttr = new UserAttr;
//                $userAttr->key = $key;
//                $userAttr->value = $value;
//                $user->attr()->save($userAttr);
//            }
//        }
    if (Cart::total() >= 10000) {
        $totalDis = (Cart::total() * 2) / 100;
    } else {
        $totalDis = 0;
    }

//        if($request->payment_method == 'foster_dbbl'){
//            
//        }elseif(){
//            
//        }else{
//            
//        }


    $grossTotal = $request->amnt_total;
    $date = date('Y-m-d');
    $newDate = date("Y-m-d", strtotime($date . "+2 day"));
    $order = new Order;
    $order->total = $grossTotal;
    $order->net_total = Cart::total(null, null, '') - $request->cuppon - $totalDis - $request->bank_dis;
    $order->user_id = $userId;
    $order->billing_id = $billing->id;
    $order->shipping_id = $shippingId;
    $order->comments = $request->order_comment;
    $order->shipping = $request->shippingfee;
    if ($request->billing['district'] != 1) {
        $order->pickup_date = $newDate;
        $order->pickup_time = $request->billing['pickup_time'];
    } else {
        $order->pickup_date = $request->billing['pickup_date'];
        $order->pickup_time = $request->billing['pickup_time'];
    }
    $order->status = 1;
    $order->save();


    foreach (Cart::content() as $product) {
        $item = [];
        $item = new OrderItems;
        $item->order_id = $order->id;
        $item->product_id = $product->id;
        $item->name = $product->name;
        $item->qty = $product->qty;
        $item->price = $product->subtotal;
        $item->save();

    }
    Cart::destroy();
    session()->forget('coupon');
    session()->forget('deliverytype');


    return redirect()->route('checkout')->with('flash_success','Coupon Code Removed Successfully');

    $payment = new Payment;
    $payment->order_id = $order->id;
    if ($request->payment_method != 'card') {
        $payment->payment_type = $request->payment_method;
    } else {
        $payment->payment_type = $request->online_method;
    }
    $payment->status = 2;
    $payment->save();

    $smsMobile = $request->billing['mobile'];

    $sms = $this->smsGateway($request->billing['mobile'], $order->id);

    Cart::destroy();
//
//        $notifyInfo = $data['order'] = Order::with('items', 'payment', 'items.product')->find($order->id);
    $notifyInfo = $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($order->id);
//        //sent user email
    $billing->notify(new NewOrder($notifyInfo));
    User::find(20)->notify(new NewOrderAdmin($notifyInfo));
    $payment_method = $request->payment_method;
    if ($payment_method != 'card') {
        if (Auth::check()) {
            return ['success' => 1, 'auth' => 1, 'order_id' => $order->id];
        } else {
            return ['success' => 1, 'auth' => 0, 'order_id' => $order->id];
        }
    } else {
        $card_method = $request->online_method;
        if ($card_method == 'foster') {
//            $sslCommerz = $this->sslPayment($order, $billing);
            $sslCommerz = $this->fosterPayment($order, $billing);
//            return $sslCommerz;
//            return $sslCommerz['result'];
            if ($sslCommerz['result'] == 'success') {
                $url = $sslCommerz['redirect'];
                return ['success' => 2, 'url' => $url];
//                return Redirect::away($sslCommerz['redirect']);
            } else {
                return ['success' => 1, 'ssl' => 0];
            }
        } elseif ($card_method == 'foster2') {
            $sslCommerz = $this->fosterPaymentAmex($order, $billing);
//            return $sslCommerz;
//            return $sslCommerz['result'];
            if ($sslCommerz['result'] == 'success') {
                $url = $sslCommerz['redirect'];
                return ['success' => 2, 'url' => $url];
//                return Redirect::away($sslCommerz['redirect']);
            } else {
                return ['success' => 1, 'ssl' => 0];
            }
        } else {
            $sslCommerz = $this->fosterPaymentDbbl($order, $billing);
//            return $sslCommerz;
//            return $sslCommerz['result'];
            if ($sslCommerz['result'] == 'success') {
                $url = $sslCommerz['redirect'];
                return ['success' => 2, 'url' => $url];
//                return Redirect::away($sslCommerz['redirect']);
            } else {
                return ['success' => 1, 'ssl' => 0];
            }
        }
    }
}

public function smsGateway($mobile, $orderId) {
    $text = "Thank you for placing order #$orderId. You will receive a phone call for verification & price/delivery confirmation. Appreciate your co-operation. ePharma.com.bd";
    $url = 'http://api.rankstelecom.com/api/v3/sendsms/json';

    $ch = curl_init($url);
    $data = array(
        'authentication' => array('username' => 'LIMITLESS_SL', 'password' => 'epharma@4321'),
        'messages' => array(array('sender' => '8804445600458', 'text' => '' . $text . '', 'recipients' => array(array('gsm' => $mobile))
    ))
    );
    $jsondataencode = json_encode($data);
    CURL_SETOPT($ch, CURLOPT_POST, 1);
    CURL_SETOPT($ch, CURLOPT_POSTFIELDS, $jsondataencode);
    CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('content-type:application/json'));
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = CURL_EXEC($ch);
}

public function fosterPayment($order, $billing) {
    $orederProducts = Order::with('items')->find($order->id);
    $item_arr = [];
    foreach ($orederProducts->items as $item) {
        $itm = array();
        $itm[] = $item->id;
        $itm[] = $item->name;
        $itm[] = $item->qty;
        $itm[] = $item->price;
        $itm[] = $item->name;
        $item_arr[] = implode(',', $itm);
    }
    $item_str = implode('|', $item_arr);
//        return $item_str;
    $urlparamForHash = http_build_query(
        array(
            'mcnt_AccessCode' => '160714072816',
                    'mcnt_TxnNo' => 'Txn' . $order->id, //Ymdhmsu//PNR
                    'mcnt_ShortName' => 'ePharma',
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12',
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT'
                )
    );
//        return $urlparamForHash;
    $secretkey = '025758653f53d6ac124ce1ffad535b20';
    $secret = strtoupper($secretkey);
    $hashinput = hash_hmac('SHA256', $urlparamForHash, pack('H*', $secret));
//        return $hashinput;
        //Foster payment integration

        $domain = 'epharma.com.bd'; // or Manually put your domain name
        $ip = '35.162.210.234'; //domain ip
        $urlparam = http_build_query(
            array(
                'mcnt_TxnNo' => 'Txn' . $order->id,
                    'mcnt_ShortName' => 'ePharma', //No Need to Change
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12', //No Need to Change
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT',
                    'cust_InvoiceTo' => $billing->name,
                    'cust_CustomerServiceName' => 'Medicine', //must
                    'cust_CustomerName' => $billing->name, //must
                    'cust_CustomerEmail' => isset($billing->email) ? $billing->email : 'info@epharma.com.bd', //must
                    'cust_CustomerAddress' => $billing->address,
                    'cust_CustomerContact' => $billing->mobile, //must
                    'cust_CustomerGender' => '',
                    'cust_CustomerCity' => 'Dhaka', //must
                    'cust_CustomerState' => 'dhaka',
                    'cust_CustomerPostcode' => '',
                    'cust_CustomerCountry' => 'Bangladesh',
                    'cust_Billingaddress' => 'Bangladesh', //must
                    'cust_ShippingAddress' => 'Bangladesh',
                    'cust_orderitems' => $item_str, //must
                    'GW' => '', //optional City, dbbl
                    'CardType' => '', //optional, ''
                    'success_url' => url('success'), //must
                    'cancel_url' => url('cancel'), //must
                    'fail_url' => url('fail'), //must
                    'merchentdomainname' => $domain, // or Manually put your domain name
                    'merchentip' => $ip,
                    'mcnt_SecureHashValue' => $hashinput
                )
        );

        return array(
            'result' => 'success',
            'redirect' => "https://payment.fosterpayments.com/fosterpayments/receivemerchantpaymentrequest.php?" . $urlparam
//            'redirect' => "http://demo.fosterpayments.com/fosterpayments/receivemerchantpaymentrequestwsfc.php?" . $urlparam
        );
    }

    public function fosterPaymentAmex($order, $billing) {
        $orederProducts = Order::with('items')->find($order->id);
        $item_arr = [];
        foreach ($orederProducts->items as $item) {
            $itm = array();
            $itm[] = $item->id;
            $itm[] = $item->name;
            $itm[] = $item->qty;
            $itm[] = $item->price;
            $itm[] = $item->name;
            $item_arr[] = implode(',', $itm);
        }
        $item_str = implode('|', $item_arr);
//        return $item_str;
        $urlparamForHash = http_build_query(
            array(
                'mcnt_AccessCode' => '160714072816',
                    'mcnt_TxnNo' => 'Txn' . $order->id, //Ymdhmsu//PNR
                    'mcnt_ShortName' => 'ePharma',
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12',
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT'
                )
        );
//        return $urlparamForHash;
        $secretkey = '025758653f53d6ac124ce1ffad535b20';
        $secret = strtoupper($secretkey);
        $hashinput = hash_hmac('SHA256', $urlparamForHash, pack('H*', $secret));
//        return $hashinput;
        //Foster payment integration

        $domain = 'epharma.com.bd'; // or Manually put your domain name
        $ip = '35.162.210.234'; //domain ip
        $urlparam = http_build_query(
            array(
                'mcnt_TxnNo' => 'Txn' . $order->id,
                    'mcnt_ShortName' => 'ePharma', //No Need to Change
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12', //No Need to Change
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT',
                    'cust_InvoiceTo' => $billing->name,
                    'cust_CustomerServiceName' => 'Medicine', //must
                    'cust_CustomerName' => $billing->name, //must
                    'cust_CustomerEmail' => isset($billing->email) ? $billing->email : 'info@epharma.com.bd', //must
                    'cust_CustomerAddress' => $billing->address,
                    'cust_CustomerContact' => $billing->mobile, //must
                    'cust_CustomerGender' => '',
                    'cust_CustomerCity' => 'Dhaka', //must
                    'cust_CustomerState' => 'dhaka',
                    'cust_CustomerPostcode' => '',
                    'cust_CustomerCountry' => 'Bangladesh',
                    'cust_Billingaddress' => 'Bangladesh', //must
                    'cust_ShippingAddress' => 'Bangladesh',
                    'cust_orderitems' => $item_str, //must
                    'GW' => 'CITY', //optional City, DBBL
                    'CardType' => 'AMEX', //optional, ''
                    'success_url' => url('success'), //must
                    'cancel_url' => url('cancel'), //must
                    'fail_url' => url('fail'), //must
                    'merchentdomainname' => $domain, // or Manually put your domain name
                    'merchentip' => $ip,
                    'mcnt_SecureHashValue' => $hashinput
                )
        );

        return array(
            'result' => 'success',
            'redirect' => "https://payment.fosterpayments.com/fosterpayments/receivemerchantpaymentrequest.php?" . $urlparam
        );
    }

    public function fosterPaymentDbbl($order, $billing) {
        $orederProducts = Order::with('items')->find($order->id);
        $item_arr = [];
        foreach ($orederProducts->items as $item) {
            $itm = array();
            $itm[] = $item->id;
            $itm[] = $item->name;
            $itm[] = $item->qty;
            $itm[] = $item->price;
            $itm[] = $item->name;
            $item_arr[] = implode(',', $itm);
        }
        $item_str = implode('|', $item_arr);
//        return $item_str;
        $urlparamForHash = http_build_query(
            array(
                'mcnt_AccessCode' => '160714072816',
                    'mcnt_TxnNo' => 'Txn' . $order->id, //Ymdhmsu//PNR
                    'mcnt_ShortName' => 'ePharma',
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12',
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT'
                )
        );
//        return $urlparamForHash;
        $secretkey = '025758653f53d6ac124ce1ffad535b20';
        $secret = strtoupper($secretkey);
        $hashinput = hash_hmac('SHA256', $urlparamForHash, pack('H*', $secret));
//        return $hashinput;
        //Foster payment integration

        $domain = 'epharma.com.bd'; // or Manually put your domain name
        $ip = '35.162.210.234'; //domain ip
        $urlparam = http_build_query(
            array(
                'mcnt_TxnNo' => 'Txn' . $order->id,
                    'mcnt_ShortName' => 'ePharma', //No Need to Change
                    'mcnt_OrderNo' => $order->id,
                    'mcnt_ShopId' => '12', //No Need to Change
                    'mcnt_Amount' => $order->net_total + $order->shipping,
                    'mcnt_Currency' => 'BDT',
                    'cust_InvoiceTo' => $billing->name,
                    'cust_CustomerServiceName' => 'Medicine', //must
                    'cust_CustomerName' => $billing->name, //must
                    'cust_CustomerEmail' => isset($billing->email) ? $billing->email : 'info@epharma.com.bd', //must
                    'cust_CustomerAddress' => $billing->address,
                    'cust_CustomerContact' => $billing->mobile, //must
                    'cust_CustomerGender' => '',
                    'cust_CustomerCity' => 'Dhaka', //must
                    'cust_CustomerState' => 'dhaka',
                    'cust_CustomerPostcode' => '',
                    'cust_CustomerCountry' => 'Bangladesh',
                    'cust_Billingaddress' => 'Bangladesh', //must
                    'cust_ShippingAddress' => 'Bangladesh',
                    'cust_orderitems' => $item_str, //must
                    'GW' => 'DBBL', //optional City, DBBL
                    'CardType' => '', //optional, ''
                    'success_url' => url('success'), //must
                    'cancel_url' => url('cancel'), //must
                    'fail_url' => url('fail'), //must
                    'merchentdomainname' => $domain, // or Manually put your domain name
                    'merchentip' => $ip,
                    'mcnt_SecureHashValue' => $hashinput
                )
        );

        return array(
            'result' => 'success',
            'redirect' => "https://payment.fosterpayments.com/fosterpayments/receivemerchantpaymentrequest.php?" . $urlparam
        );
    }

    public function sslPayment($order, $billing) {
        /* PHP */
        $post_data = array();
        $post_data['store_id'] = "Epharmalimitedlive";
        $post_data['store_passwd'] = "Epharmalimitedlive36174";
        $post_data['total_amount'] = $order->total + $order->shipping;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->id;
        $post_data['success_url'] = url('success');
        $post_data['fail_url'] = url('fail');
        $post_data['cancel_url'] = url('cancel');

# EMI INFO
        $post_data['emi_option'] = "0";

# CUSTOMER INFORMATION
        $post_data['cus_name'] = $billing->first_name . ' ' . $billing->last_name;
        $post_data['cus_email'] = $billing->email;
        $post_data['cus_add1'] = $billing->address;
        $post_data['cus_city'] = $billing->city;
        $post_data['cus_state'] = $billing->city;
        $post_data['cus_postcode'] = $billing->zip_code;
        $post_data['cus_country'] = $billing->country;
        $post_data['cus_phone'] = $billing->mobile;
//        return $post_data;
        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 10);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);


        $content = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !( curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

# PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
//        return $sslcz['GatewayPageURL'];
        return $sslcz['GatewayPageURL'];
    }

    public function order_info($id) {
        $data['order'] = Order::with('items', 'payment', 'items.product')->find($id);

        $data['billing'] = User::find(auth()->id());

        $data['shipping'] = Address::with('zilla', 'upazilla')->where('user_id',auth()->id())->first();
        return Theme::view('order_info', $data);
    }

    public function user_login() {
        return Theme::view('user_login');
    }
    public function newuser_login() {
        return view('frontend.userlogin');
    }


    public function newregistration() {
        return view('frontend.userregister');
    }

    public function post_login(Request $request) {
        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $finduser= User::where('mobile',$request->mobile)->first();

        if($finduser && Hash::check($request->password, $finduser->password))
        {

            Auth::login($finduser);
            return redirect(route('home'));
        }

        else {
          return redirect()->back()->withErrors('Invalid Login credentials');
      }
      



  }

  public function send_varification_pin() {
    $mobile = Session::get('mobile');
    $passwordStoredInDatabase = User::select('id', 'name', 'password')->where('mobile', $mobile)->first();
    $randPin = str_pad(rand(0, 99999), 5, "0", STR_PAD_LEFT);
    $text = "Dear $passwordStoredInDatabase->name, Your ePharma verification code : $randPin";
    $url = 'http://api.rankstelecom.com/api/v3/sendsms/json';

    $ch = curl_init($url);
    $data = array(
        'authentication' => array('username' => 'LIMITLESS_SL', 'password' => 'epharma@4321'),
        'messages' => array(array('sender' => '8804445600458', 'text' => '' . $text . '', 'recipients' => array(array('gsm' => '88' . $mobile . ''))
    ))
    );
    $jsondataencode = json_encode($data);
    CURL_SETOPT($ch, CURLOPT_POST, 1);
    CURL_SETOPT($ch, CURLOPT_POSTFIELDS, $jsondataencode);
    CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('content-type:application/json'));
    $result = CURL_EXEC($ch);
    curl_close($ch);

    $user = User::find($passwordStoredInDatabase->id);
    $user['pin_number'] = $randPin;
    $user->save();

    return redirect('check-pin')->withErrors(['A varification code send to your mobile via sms!']);
}

public function login() {
    return Theme::view('login');
}

public function registration() {
    return Theme::view('registration');
}



public function user_index() {
    $data['userInfo'] = Auth::user();
    $data['address'] = Address::where('user_id', $data['userInfo']->id)->first();
    return Theme::view('user_index', $data);
}

public function user_edit() {
    $data['userInfo'] = Auth::user();
    return Theme::view('user_edit', $data);
}

public function useraddresslist() {
    $userId = Auth::user()->id;
    $data['userInfo'] = Auth::user();
    $data['district'] = District::pluck('name', 'id');
    $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
    $data['addresss'] = Address::where('user_id', $userId)->get();


    return Theme::view('useraddresslist', $data);
}

public function addnewuseraddress()
{
 $userId = Auth::user()->id;
 $data['userInfo'] = Auth::user();
 $data['district'] = District::pluck('name', 'id');
 $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
 $data['address'] = Address::where('user_id', $userId)->first();
 return Theme::view('addnewuseraddress', $data);
}

public function editaddress($id)
{
 $userId = Auth::user()->id;
 $data['userInfo'] = Auth::user();
 $data['district'] = District::pluck('name', 'id');
 $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
 $data['address'] = Address::find($id);
 return Theme::view('edituseraddress', $data);
}




public function storeediteduseraddress(Request $request,$id) {




    $this->validate($request, [

        'email' => 'required|email',
        'mobile' => 'required',
        'address' => 'required',
    ]);

    $userId = Auth::user()->id;

    $billing = Address::find($id); 
    $billing->user_id = $userId;
    $billing->name =$request->get('name');
    $billing->heading =$request->get('heading');
    $billing->email = $request->get('email');
    $billing->address = $request->get('address');
    $billing->country = $request->get('country');

    $billing->district = $request->get('district');

    $billing->mobile = $request->get('mobile');

    $billing->address2 = $request->get('address2');
    $billing->landmark = $request->get('landmark');

    $billing->save();

    return redirect(url('customer/address/new'))->with('message','Address Updated Successfully') ;
}
public function savenewaddress(Request $request) {
    $this->validate($request, [

        'email' => 'required|email',
        'mobile' => 'required',
        'address' => 'required',
    ]);

    $userId = Auth::user()->id;


    $billing = new Address;
    $billing->user_id = $userId;
    $billing->defaultaddress ='false';
    $billing->name =$request->get('name');
    $billing->heading =$request->get('heading');
    $billing->email = $request->get('email');
    $billing->address = $request->get('address');
    $billing->country = $request->get('country');
    
    $billing->district = $request->get('district');
    
    $billing->mobile = $request->get('mobile');
    
    $billing->address2 = $request->get('address2');
    $billing->landmark = $request->get('landmark');
    
    $billing->save();

    return redirect(url('customer/address/new'))->with('message','Address Updated Successfully') ;
}


public function user_order_history() {
    $data['userInfo'] = Auth::user();

    $userId = Auth::user()->id;
    $data['userOrder'] = User::with('address', 'orders', 'orders.items', 'orders.items.product', 'orders.items.product.media')->find($userId);
//        return $data['userOrder']->address;
        // $data['billing'] = Address::find($data['userOrder']->orders[0]->billing_id);
        // $data['shipping'] = Address::find($data['userOrder']->orders[0]->shipping_id);
//        return $data['userOrder']->orders;

    return Theme::view('user_order_history', $data);
}

public function review_customer() {
    return Theme::view('review_customer');
}

public function wishlist() {
    $data['wishlist'] = Wishlist::with('product', 'product.media')->where('user_id', Auth::id())->get();
    return Theme::view('wishlist', $data);
}

public function newsletter_manage() {
    return Theme::view('newsletter_manage');
}

public function update_user(Request $request) {
    $user = Auth::user();

    $user->first_name = $request->get('first_name');
    $user->last_name = $request->get('last_name');
    $user->address = $request->get('address');
    $user->email = $request->get('email');
    $user->mobile = $request->get('mobile');

    if (!$request->get('password') == '') {

        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = bcrypt($request->get('password'));
        } else {
            return redirect('customer/account/edit')->with('message', 'Incorrect Current Password');
        }
    }

    $user->save();

    return redirect('customer/account/edit')->with('message', 'Your account has been updated!');
}

public function product_search(Request $request) {
    $searchString = Input::get('search_string');
//        return $request->all();
    $limit = $request->has('limit') ? $request->get('limit') : 9;
    $data['products'] = Product::with('media')
    ->where('name', 'like', '%' . $searchString . '%')
    ->where('is_available', 1)
    ->where('delete_status', 0)
    ->paginate($limit);
    return Theme::view('search', $data);
}

public function ajaxProduct(Request $request) {
    $filter = $request->get('option');
    $data['products'] = Product::whereHas('attribute', function($query) use($filter) {
        $query->where('option_id', $filter['option']);
    })
    ->whereHas('categories', function($query) use($filter) {
        $query->where('term_id', $filter['category']);
    })
    ->paginate(9);
    return Theme::view('ajax-product', $data);
}

public function about_us() {
    return Theme::view('about_us');
}

public function contact_us() {
    return Theme::view('contact_us');
}

public function newcontact_us() {
 return view('frontend.contactus');
}

public function newnews() {
 return view('frontend.news');
}

public function newabout_us() {
 return view('frontend.aboutus');
}

public function customer_service() {
    return Theme::view('customer_service');
}

public function shipping_handling() {
    return Theme::view('shipping_handling');
}

public function returns_exchange() {
    return Theme::view('returns_exchange');
}

public function privacy_policy() {
    return Theme::view('privacy_policy');
}

public function terms_conditions() {
    return Theme::view('terms_conditions');
}

public function call_me(Request $request) {
    $this->validate($request, [
        'phone' => 'required',
    ]);

    $callMe = new Callme;
    $callMe->mobile = $request->get('phone');
    $callMe->status = 0;
    if ($callMe->save()) {
        $notifyInfo = $callMe->mobile;
        User::find(1)->notify(new CallRequest($notifyInfo));
    }

//        MAIL_DRIVER = smtp
//        MAIL_HOST = ssl://smtp.gmail.com
//        MAIL_PORT = 465
//        MAIL_USERNAME = lgedapps2017@gmail.com
//        MAIL_PASSWORD = tm@123456
//        MAIL_ENCRYPTION = null

    return ['success' => 1, 'data' => $callMe];
}

public function addToWishlist(Request $request) {
    Wishlist::firstOrNew(['product_id' => $request->id, 'user_id' => Auth::id()])->save();
}

public function success(Request $request) {
    $order_id = $request->get('OrderNo');
    $payment = Payment::where('order_id', $order_id)->first();
    $payment->mcnt_trans_no = $request->get('MerchantTxnNo');
    $payment->tnx_amount = $request->get('TxnAmount');
    $payment->hashkey = $request->get('hashkey');
    $payment->fosterid = $request->get('fosterid');
    $payment->currency_type = $request->get('Currency');
    $payment->currency_rate = $request->get('ConvertionRate');
    $payment->response = json_encode($request->all());
    $payment->status = 1;
    if ($payment->save()) {
        $userMail = Order::select('address.email')
        ->leftJoin('address', 'address.id', '=', 'orders.billing_id')
        ->find($order_id);
            //sent user email
        $userMail->notify(new PaymentMail($payment));

        Session::flash('message', 'Payment success!');
        return redirect('/');
    } else {
        Session::flash('message', 'Error: Payment Failed! Please conact with our service team');
        return redirect('/');
    }
}

public function cancel(Request $request) {
    $order_id = $request->get('OrderNo');
    $payment = Payment::where('order_id', $order_id)->first();
    $payment->response = json_encode($request->all());
    $payment->status = 3;
    if ($payment->save()) {
        Session::flash('message', 'Payment canceled as per your request!');
        return redirect('/');
    } else {
        Session::flash('message', 'Error: Payment Failed! Please conact with our service team');
        return redirect('/');
    }
}

public function fail(Request $request) {
    $order_id = $request->get('OrderNo');
    $payment = Payment::where('order_id', $order_id)->first();
    $payment->mcnt_trans_no = $request->get('MerchantTxnNo');
    $payment->tnx_amount = $request->get('TxnAmount');
    $payment->hashkey = $request->get('hashkey');
    $payment->fosterid = $request->get('fosterid');
    $payment->currency_type = $request->get('Currency');
    $payment->currency_rate = $request->get('ConvertionRate');
    $payment->response = json_encode($request->all());
    $payment->status = 2;
    if ($payment->save()) {

        $userMail = Order::select('address.email')
        ->leftJoin('address', 'address.id', '=', 'orders.billing_id')
        ->find($order_id);
            //sent user email
        $userMail->notify(new PaymentMail($payment));

        Session::flash('message', 'Payment Failed! Please conact with our service team');
        return redirect('/');
    } else {
        Session::flash('message', 'Error: Payment Failed! Please with conact our service team');
        return redirect('/');
    }
}

public function how_to_order() {
    return Theme::view('how_to_order');
}

public function newhow_to_order() {
   return view('frontend.howtoorder');
}

public function partners() {
    return Theme::view('partners');
}
public function newpartners() {
      return view('frontend.partners');
}

public function newprivacy_policy() {
      return view('frontend.policy');
}


public function news() {
    return Theme::view('news');
}

public function product_inquiry() {
    return Theme::view('product_inquiry');
}

public function store_product_request(Request $request) {
    $this->validate($request, [
        'full_name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'file' => 'mimes:jpg,jpeg,pdf',
    ]);
    $prescription = New ProductInquiry;
    $prescription->full_name = $request->full_name;
    $prescription->inquery_type = 1;
    $prescription->mobile = $request->mobile;
    $prescription->email = $request->email;
    $prescription->product_inquiry = $request->product_inquiry;
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $filename = $image->getClientOriginalName();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(400, 650);
        $image_resize->save(public_path('prescription/' . $filename));
        $prescription->file = $filename;
    }
    if ($prescription->save()) {
        Session::flash('success', 'Your query save successfull');
        return redirect('product-inquiry');
    } else {
        Session::flash('error', 'Data insert failed! Please try again!!!');
        return redirect('product-inquiry');
    }
}

public function store_prescription(Request $request) {
    $this->validate($request, [
        'full_name' => 'required',
        'mobile' => 'required',
        'file' => 'mimes:jpg,jpeg,pdf',
    ]);
    $prescription = New ProductInquiry;
    $prescription->full_name = $request->full_name;
    $prescription->inquery_type = 2;
    $prescription->mobile = $request->mobile;
    $prescription->email = $request->email;
    $prescription->product_inquiry = $request->product_inquiry;
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $unique_date = date_timestamp_get(date_create());
        $file_name = $unique_date . $file->getClientOriginalName();
        $file->move(public_path('prescription'), $unique_date . $file->getClientOriginalName());
        $prescription->file = $file_name;
    }
    if ($prescription->save()) {
        Session::flash('success', 'Your prescription submitted successful');
        return redirect('product-inquiry');
    } else {
        Session::flash('error', 'Data insert failed! Please try again!!!');
        return redirect('product-inquiry');
    }
}

public function prescription_upload() {
    return Theme::view('prescription_upload');
}

public function get_shipping_value(Request $req) {
    $disId = $req->disId;
    $shipping = District::find($disId);
    return $shipping->shipping_fee;
}

public function get_area_shipping_value(Request $req) {
    $areaId = $req->areaId;
    $shipping = Area::find($areaId);
    return $shipping->shipping_fee;
}

public function ajax_search(Request $request) {
    $searchText = $request->name;
    $search_cat = $request->catId;
//        Product::with('media', 'terms', 'brandattrOptions.attributeValue')->find($slug);
    if ($search_cat == 1) {
        $result = Product::with('media', 'terms', 'attribute.attributeValue', 'brandattrOptions.attributeValue')
        ->where('name', 'like', '%' . $searchText . '%')
        ->where('is_available', 1)
        ->where('delete_status', 0)
        ->orderBy(DB::raw('abs(name),name'), 'asc')
        ->take(6)
        ->get();
    } else {
        $result = Product::with('media', 'terms', 'attribute.attributeValue', 'brandattrOptions.attributeValue')
        ->where('generic_name', 'like', '%' . $searchText . '%')
        ->where('is_available', 1)
        ->where('delete_status', 0)
        ->orderBy(DB::raw('abs(name),name'), 'asc')
        ->take(6)
        ->get();
//            return $result = ProductV::with('terms', 'brandattrOptions.attributeValue')->where('g_name', 'like', $searchText . '%')->take(5)->get();
    }
//        return $result[0]->media[0]->src;
//        return count($result);

    if (count($result) > 0) {
        $data = [];

        foreach ($result as $key => $val) {
            if ($val->brandattrOptions) {
                $brandDis = $val->brandattrOptions->attributeValue->discount_percentage;
            } else {
                $brandDis = 0;
            }
            $catDis = isset($val->terms[0]) ? $val->terms[0]->discount_percentage : 0;
            $data[$key]['id'] = $val->id;
            $data[$key]['name'] = $val->name;
            $data[$key]['qty'] = $val->min_quantity;
            $data[$key]['orgPrice'] = $val->price;
            $data[$key]['price'] = $this->fill_dropbox($val->price, $val->discount_percentage, $val->discount_amount, $catDis, $brandDis);
            $data[$key]['proDisPer'] = $val->discount_percentage;
            $data[$key]['proDisAmnt'] = $val->discount_amount;
            $data[$key]['catDis'] = isset($val->terms[0]) ? $val->terms[0]->discount_percentage : 0;
            $data[$key]['brandDis'] = $brandDis;
            $data[$key]['g_name'] = '';
            $data[$key]['c_name'] = '';
            $data[$key]['t_name'] = '';
            $data[$key]['p_name'] = '';
            if (isset($val->attribute[0])) {
                if ($val->attribute[0]->attributeValue->attribute_id == 1) {
                    $data[$key]['g_name'] = trim($val->attribute[0]->attributeValue->title);
                } elseif ($val->attribute[0]->attributeValue->attribute_id == 2) {
                    $data[$key]['c_name'] = trim($val->attribute[0]->attributeValue->title);
                } elseif ($val->attribute[0]->attributeValue->attribute_id == 3) {
                    $data[$key]['t_name'] = trim($val->attribute[0]->attributeValue->title);
                } else {
                    $data[$key]['p_name'] = trim($val->attribute[0]->attributeValue->title);
                }
            }
            if (isset($val->attribute[1])) {
                if ($val->attribute[1]->attributeValue->attribute_id == 1) {
                    $data[$key]['g_name'] = $val->attribute[1]->attributeValue->title;
                } elseif ($val->attribute[1]->attributeValue->attribute_id == 2) {
                    $data[$key]['c_name'] = $val->attribute[1]->attributeValue->title;
                } elseif ($val->attribute[1]->attributeValue->attribute_id == 3) {
                    $data[$key]['t_name'] = $val->attribute[1]->attributeValue->title;
                } else {
                    $data[$key]['p_name'] = $val->attribute[1]->attributeValue->title;
                }
            }
            if (isset($val->attribute[2])) {
                if ($val->attribute[2]->attributeValue->attribute_id == 1) {
                    $data[$key]['g_name'] = $val->attribute[2]->attributeValue->title;
                } elseif ($val->attribute[2]->attributeValue->attribute_id == 2) {
                    $data[$key]['c_name'] = $val->attribute[2]->attributeValue->title;
                } elseif ($val->attribute[2]->attributeValue->attribute_id == 3) {
                    $data[$key]['t_name'] = $val->attribute[2]->attributeValue->title;
                } else {
                    $data[$key]['p_name'] = $val->attribute[2]->attributeValue->title;
                }
            }
            if (isset($val->attribute[3])) {
                if ($val->attribute[3]->attributeValue->attribute_id == 1) {
                    $data[$key]['g_name'] = $val->attribute[3]->attributeValue->title;
                } elseif ($val->attribute[3]->attributeValue->attribute_id == 2) {
                    $data[$key]['c_name'] = $val->attribute[3]->attributeValue->title;
                } elseif ($val->attribute[3]->attributeValue->attribute_id == 3) {
                    $data[$key]['t_name'] = $val->attribute[3]->attributeValue->title;
                } else {
                    $data[$key]['p_name'] = $val->attribute[3]->attributeValue->title;
                }
            }
                //$data[$key]['img'] = 'tb_' . $val->media[0]->src;
            if (empty($val->media[0]->src)) {
                $data[$key]['img'] = 'tb_1Go032fuC2QI3jbK6dmIpO73T4chZPHuSo1raIiv.jpeg';
            } else {
                $data[$key]['img'] = 'tb_' . $val->media[0]->src;
            }
        }
    } else {
        $data = 1;
    }

    return $data;
}

function fill_dropbox($price, $disPer, $disAmnt, $catDis, $brandDis) {
    if ($catDis != 0 || $brandDis != 0) {
        $array = [
            0 => $catDis,
            1 => $brandDis
        ];
        $maxs = max($array);
        return number_format(($price - (($price * $maxs) / 100)), 2);
    } elseif ($disPer != 0 || $disAmnt != 0) {
        if ($disPer != 0) {
            return number_format(($price - (($price * $disPer) / 100)), 2);
        } else {
            return number_format(($price - $disAmnt), 2);
        }
    } else {
        return $price;
    }
}

public function check_pin() {
    return Theme::view('pin_page');
}

public function varify_pin(Request $request) {
    $this->validate($request, [
        'pin_number' => 'required|numeric',
    ]);
    $pin = $request->get('pin_number');
    $mobile = Session::get('mobile');
    $res = User::select('id')->where(array(
        'mobile' => $mobile,
        'pin_number' => $pin,
    ))->first();
    if (count($res) > 0) {
        $user = User::find($res->id);
        $user['status'] = 1;
        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/');
    } else {
        Session::flash("error", "Your mobile number and code doesn't match!");
        return redirect('check-pin')->withErrors("Varification code doesn't match, Please try again!");
    }
}

public function refill_request() {
    return Theme::view('refill_request');
}

public function ajax_refill_data(Request $request) {
    $this->validate($request, [
        'refillId' => 'required|numeric',
    ]);
    $refillId = $request->refillId;
    $order_product = Order::with('items', 'items.product', 'items.product.terms', 'items.product.brandattrOptions.attributeValue')->where('orders.id', $refillId)->get();

//        return $order_product[0]->items;
    foreach ($order_product[0]->items as $key => $value) {
        $data[$key]['id'] = $value->product_id;
        $data[$key]['qty'] = $value->qty;
//            $data[$key]['price'] = $value->product->brandattrOptions->attributeValue->discount_percentage;
        $data[$key]['price'] = cat_product_price($value->product->price, $value->product->discount_percentage, $value->product->discount_amount, $value->product->terms[0]->discount_percentage, $value->product->brandattrOptions->attributeValue->discount_percentage);
    }
    return $data;
}


public function pdf()
{


   return view('invoiced');

}

public function export()
{

    $order = User::all();
    $pdf = PDF::loadView('invoice',compact('order'))->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']) ;
    return $pdf->download('invoice.pdf');
}



}

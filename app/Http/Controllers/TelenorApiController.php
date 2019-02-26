<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Theme;
use Epharma\Model\Product;
use Epharma\Model\Category;
use Epharma\Model\User;
use Epharma\Model\UserAttr;
use Epharma\Model\Order;
use Epharma\Model\Address;
use Epharma\Model\OrderItems;
use Epharma\Model\ProductAttr;
use Epharma\Model\Callme;
use Epharma\Model\Wishlist;
use Epharma\Model\Payment;
use Epharma\Model\Option;
use Epharma\Model\District;
use Epharma\Model\Area;
use Epharma\Model\ProductInquiry;
use Epharma\Model\TonicEmail;
use Cart;
use Auth;
use Hash;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Notifications\NewOrder;
use App\Notifications\NewOrderAdmin;
use App\Notifications\NewOrderTelenor;
use App\Notifications\PaymentMail;
use App\Notifications\CallRequest;
use Illuminate\Notifications\Notifiable;
use Exception;

class TelenorApiController extends Controller {

    use Notifiable;

    public function __construct(Request $request) {
//        $headers = $request->headers->all();
//        if ($headers['api-key'][0] != "TM@The@The@Messenger@ePharma") {
//            echo "Api Key Not Valid";
//            die();
//        }
    }

    public function product_list(Request $request) {
        $products = Product::with('attribute.attribute', 'attribute.attributeValue')->where('products.name', 'LIKE', '%' . $request->name . '%')->orderBy('products.name')->paginate(20);
        foreach ($products as $key => $product) {
            $data[$key]['product_id'] = $product->id;
            $data[$key]['product_name'] = $product->name;
            $data[$key]['is_stock'] = $product->is_available;
            $data[$key]['price'] = $product->price;
            $data[$key]['generic_name'] = '';
            $data[$key]['company_name'] = '';
            $data[$key]['type'] = '';
            $data[$key]['packsize'] = '';
            if ($product->origin == 0) {
                $data[$key]['origin'] = 'Local';
                $data[$key]['discount_percentage'] = 10;
            } else {
                $data[$key]['origin'] = 'Foreign';
                $data[$key]['discount_percentage'] = 5;
            }
            if (count($product->attribute) != 0) {
                foreach ($product->attribute as $attr) {
//                return $attr->attributeValue;
                    if ($attr->attribute_id == 1) {
                        $data[$key]['generic_name'] = $attr->attributeValue->title;
                    }
                    if ($attr->attribute_id == 2) {
                        $data[$key]['company_name'] = $attr->attributeValue->title;
                    }
                    if ($attr->attribute_id == 3) {
                        $data[$key]['type'] = $attr->attributeValue->title;
                    }
                    if ($attr->attribute_id == 4) {
                        $data[$key]['packsize'] = '1pcs';
                    }
                }
            }
        }
        if ($products->count() > 0) {
            return ['success' => true, 'total_count' => $products->total(), 'count' => $products->count(), 'result' => $data];
        } else {
            return ['success' => false, 'msg' => 'No product record found'];
        }
    }

    public function telenor_checkout(Request $request) {
//        return stripslashes($request->prescription);
        $response = json_encode($request->all());
//        return $response;
//        $jsonFile = $request->products;
//        $data = json_decode($jsonFile, true);
//        foreach($data as $val){
//            return $val['id'];
//        }
        $validator = Validator::make($request->all(), [
                    'billing_name' => 'required',
                    'billing_email' => 'required|email',
                    'billing_district' => 'required',
                    'billing_mobile' => 'required',
                    'billing_address' => 'required',
                    'user_mobile' => 'required|numeric',
        ]);


// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

//        if (Auth::check()) {
//            $userId = $request->user_id;
//        } else {
//            $userId = NULL;
//        }
        //Billing Function add
        if ($request->cart_total >= 300) {

            try {
                $billing = new Address;
                $billing->user_id = 50;
                $billing->name = $request->billing_name;
                $billing->email = $request->billing_email;
                $billing->address = $request->billing_address;
                $billing->country = 'Bangladesh';
                $billing->district = $request->billing_district;
                $billing->area = $request->billing_area;
                $billing->mobile = $request->billing_mobile;
                //        $billing->phone = isset($request->billing['telephone']) ? $request->billing['telephone'] : NULL;
                $billing->save();



                //Shipping Function add or update
                if (!isset($request->shipping_same_as_billing)) {
                    $shipping = new Address;
                    $shipping->user_id = 50;
                    $shipping->name = $request->shipping_name;
                    $shipping->email = $request->shipping_email;
                    $shipping->address = $request->shipping_address;
                    $shipping->country = 'Bangladesh';
                    $shipping->district = $request->shipping_district;
                    $shipping->area = $request->shipping_area;
                    $shipping->mobile = $request->shipping_mobile;
                    $shipping->save();
                    $shippingId = $shipping->id;
                } else {
                    $shippingId = $billing->id;
                }

                $date = date('Y-m-d');
                $newDate = date("Y-m-d", strtotime($date . "+1 day"));
                $order = new Order;
                if ($request->has('prescription')) {
                    $file = stripslashes($request->prescription);
                    $contents = file_get_contents($file);
                    $f_name = substr($file, strrpos($file, '/') + 1);
                    $unique_date = date_timestamp_get(date_create());
                    $file_name = $unique_date . $f_name;
                    file_put_contents(public_path('prescription/' . $file_name), $contents);
                    $order->prescription = $file_name;
                }
                $order->total = $request->total_amount;
                $order->net_total = $request->cart_total;
                $order->user_id = 50;
                $order->user_mobile = $request->user_mobile;
                $order->billing_id = $billing->id;
                $order->shipping_id = $shippingId;
                $order->full_response = $response;
                $order->comments = $request->order_comment;
                if ($request->cart_total >= 500) {
                    $order->shipping = 0;
                } else {
                    $order->shipping = 49;
                }
                $order->pickup_date = $newDate;
                $order->pickup_time = '';
                $order->status = 0;
                $order->save();

                $products = json_decode($request->products, true);
                foreach ($products as $product) {
                    $item = [];
                    $item = new OrderItems;
                    $item->order_id = $order->id;
                    $item->product_id = $product['id'];
                    $item->name = $product['name'];
                    $item->qty = $product['qty'];
                    $item->price = $product['subtotal'];
                    $item->save();
                }

                $payment = new Payment;
                $payment->order_id = $order->id;
                $payment->payment_type = $request->payment_method;
                $payment->status = 2;
                $payment->save();

                $sms = $this->smsGateway($request->billing_mobile, $order->id);

                $tonicEmail = new TonicEmail;
                $tonicEmail->order_id = $order->id;
                $tonicEmail->email_status = 0;
                $tonicEmail->save();
                // Previous Email Function
//                $notifyInfo = $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($order->id);
//    //            return $data['order']->items[0]->product->attribute;
//    //        //sent user email
//                if ($data['order']->billingAttr->email != NULL) {
//                    $this->sendUserMail($notifyInfo, $billing);
////                    $billing->notify(new NewOrderTelenor($notifyInfo));
//                }
//                
//                $this->sendMail($notifyInfo);
//                User::find(19)->notify(new NewOrderTelenor($notifyInfo));
//                User::find(50)->notify(new NewOrderTelenor($notifyInfo));
//                User::find(20)->notify(new NewOrderTelenor($notifyInfo));
                // End of Previous Email Function
                $payment_method = $request->payment['method'];
                if ($payment_method == 'tco') {
                    $sslCommerz = $this->sslPayment($order, $billing);
                    if ($sslCommerz) {
                        return ['success' => 2, 'ssl' => $sslCommerz];
                    } else {
                        return ['success' => 1, 'ssl' => 0];
                    }
                } else {
                    return ['success' => true, 'order_id' => $order->id, 'msg' => "Order Successfully Submitted!"];
                }
            } catch (\Exception $ex) {
                return ['success' => false, 'msg' => $ex->getMessage()];
            }
        } else {
            return ['success' => false, 'msg' => "Minimum order amount must be 300 TK."];
        }
    }

    public function sendUserMail($notifyInfo, $billing) {
        $billing->notify(new NewOrderTelenor($notifyInfo));
    }

    public function sendMail() {
        $sendList = TonicEmail::where('email_status', 0)->get();
//        return $orderId = $sendList[0]->order_id;
//        return $sendList;
        foreach($sendList as $orderList) {
            $orderId = $orderList->order_id;
            $notifyInfo = $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($orderId);
//            return $data['order']->billingAttr;
            if ($data['order']->billingAttr->email != NULL) {
                $data['order']->billingAttr->notify(new NewOrderTelenor($notifyInfo));
            }
            User::find(19)->notify(new NewOrderTelenor($notifyInfo));
            User::find(50)->notify(new NewOrderTelenor($notifyInfo));
            User::find(20)->notify(new NewOrderTelenor($notifyInfo));
            $confirmList = TonicEmail::find($orderList->id);
            $confirmList->email_status = 1;
            $confirmList->save();
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

    public function district_list() {
        $district = District::get();
        if (count($district) > 0) {
            foreach ($district as $key => $val) {
                $data[$key]['id'] = $val->id;
                $data[$key]['name'] = $val->name;
            }
            return ['success' => true, 'result' => $data];
        } else {
            return ['success' => false, 'msg' => 'Sorry! No district found.'];
        }
    }

    public function area_list(Request $request) {
        $disId = $request->district_id;
        $area = Area::where('district_id', $disId)->get();
        if (count($area) > 0) {
            foreach ($area as $key => $val) {
                $data[$key]['id'] = $val->id;
                $data[$key]['name'] = $val->name;
            }
            return ['success' => true, 'result' => $data];
        } else {
            return ['success' => false, 'msg' => 'Sorry! No area found.'];
        }
    }

    public function order_status(Request $request) {
        $orderId = $request->order_id;
        $order = Order::find($orderId);
        if (count($order) > 0) {
            if ($order->status == 0) {
                return ['success' => true, 'msg' => 'Order On Processing'];
            } elseif ($order->status == 1) {
                return ['success' => true, 'msg' => 'Order On Hold'];
            } elseif ($order->status == 2) {
                return ['success' => true, 'msg' => 'Order Success'];
            } else {
                return ['success' => true, 'msg' => 'Order Cancel'];
            }
        } else {
            return ['success' => false, 'msg' => 'Sorry! No order found.'];
        }
    }

    public function cancel_order(Request $request) {
        $orderId = $request->order_id;
        $order = Order::find($orderId);
        $order->status = 3;
        $order->save();
        if ($order) {
            return ['success' => true, 'msg' => 'Order successfully cancelled!'];
        } else {
            return ['success' => false, 'msg' => 'Sorry! No order found.'];
        }
    }

    public function order_list(Request $request) {
        $path = url('prescription');
//        $path = public_path('prescription/');
        $mobile = $request->mobile;
        $mssdn = $request->mssdn;
//        return $mobile;
        $order = Order::select('orders.*', DB::raw("CONCAT('$path/', prescription) AS image_url"))->with('items', 'billingAttr', 'shippingAttr')->where('user_id', 50)->where(function($query) use ($mobile) {
                    if ($mobile) {
                        $query->where('orders.user_mobile', $mobile);
                    }
                })->where(function($query) use ($mssdn) {
                    if ($mssdn) {
                        $query->where('orders.user_mssdn', $mssdn);
                    }
                })->orderBy('orders.id', 'DESC')->paginate(20);
        if ($order->total() != 0) {
            return ['success' => true, 'result' => $order];
        } else {
            return ['success' => false, 'msg' => 'Sorry no order found!'];
        }
    }

    public function settings() {
        $data['delivery_charge'] = 49;
        $data['minimum_sale_amount'] = 300;
        $data['free_delivery_amount'] = 500;
        $data['local_product_discount_percentage'] = 10;
        $data['foreign_product_discount_percentage'] = 5;
        if ($data) {
            return ['success' => true, 'result' => $data];
        } else {
            return ['success' => false, 'msg' => 'Sorry data found!'];
        }
    }

    public function product($slug) {
        $data['title'] = 'Product';
        $data['attributes'] = ProductAttr::with('attribute', 'attributeValue')
                        ->where('product_id', $slug)->get();

        $data['product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->find($slug);

        $categories = $data['product']->categories()->pluck('id');

        $data['related_product'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->whereHas(
                        'categories', function($query)use ($categories) {
                    $query->whereIn('term_id', $categories);
                }
                )->whereNotIn('id', [$data['product']->id])->take(10)->get();
        $data['featured_products'] = Product::with('media', 'terms', 'brandattrOptions.attributeValue')->findMany(option('featured-product'));

        return Theme::view('product', $data);
    }

    public function category($slug, Request $request) {
//                $limit = (empty($request->limit)) ? 2 : $request->limit;
        $limit = $request->has('limit') ? $request->get('limit') : 9;
        $data['category'] = Category::find($slug);
        $data['subCategory'] = Category::where('parent', $data['category']->id)->get();
        $data['catProduct'] = Category::with('products', 'products.brandattrOptions.attributeValue')->where('id', $slug)->paginate($limit);
//        return $data['catProduct'][0]->products[0]->brandattrOptions->attributeValue->discount_percentage;
//                print_r($data['products']);die();
        return Theme::view('category', $data);
    }

    public function check_stock(Request $request) {
        $proId = $request->id;
        $product = Product::find($proId);
        return $product->is_available;
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
        $data['count'] = Cart::count();
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
        return $data;
        return Theme::view('cart_ajax');
    }

    public function removeCartItem(Request $request) {
        Cart::remove($request->rowId);
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
            $data['count'] = Cart::count();
            $data['total'] = Cart::total();
            $data['content'] = Cart::content();
            $data['fail'] = 1;
            return $data;
        } else {
            Cart::update($rowId, $qty);
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
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $shipping = Option::get();
            $data['district'] = District::pluck('name', 'id');
            $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
            $data['freeShip'] = $shipping[5]->value;
            $data['user_info'] = User::with('address')->find($userId);
//        return $data['user_info']->address[0];
            return Theme::view('checkout', $data);
        } else {
            $shipping = Option::get();
            $data['district'] = District::pluck('name', 'id');
            $data['areas'] = Area::where('district_id', 1)->pluck('name', 'id');
            $data['freeShip'] = $shipping[5]->value;
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
//        return $request->billing['district'];
        $this->validate($request, [
            'billing.firstname' => 'required',
            'billing.email' => 'required',
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
        if (Cart::total() >= 400) {
            $totalDis = (Cart::total() * 2) / 100;
        } else {
            $totalDis = 0;
        }
        $grossTotal = Cart::total(null, null, '') - $request->cuppon - $totalDis;
        $date = date('Y-m-d');
        $newDate = date("Y-m-d", strtotime($date . "+2 day"));
        $order = new Order;
        $order->total = $grossTotal;
        $order->net_total = Cart::total(null, null, '');
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
        $order->status = 0;
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

        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->payment_type = $request->payment['method'];
        $payment->status = 2;
        $payment->save();


        Cart::destroy();
//
//        $notifyInfo = $data['order'] = Order::with('items', 'payment', 'items.product')->find($order->id);
//        //sent user email
//        $billing->notify(new NewOrder($notifyInfo));
//        User::find(2)->notify(new NewOrderAdmin($notifyInfo));
        $payment_method = $request->payment['method'];
        if ($payment_method == 'tco') {
            $sslCommerz = $this->sslPayment($order, $billing);
            if ($sslCommerz) {
                return ['success' => 2, 'ssl' => $sslCommerz];
            } else {
                return ['success' => 1, 'ssl' => 0];
            }
        } else {
            if (Auth::check()) {
                return ['success' => 1, 'auth' => 1];
            } else {
                return ['success' => 1, 'auth' => 0];
            }
        }
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

    public function login() {
        return Theme::view('login');
    }

    public function registration() {
        return Theme::view('registration');
    }

    public function user_index() {
        $data['userInfo'] = Auth::user();
        return Theme::view('user_index', $data);
    }

    public function user_edit() {
        $data['userInfo'] = Auth::user();
        return Theme::view('user_edit', $data);
    }

    public function user_new_address() {
        $userId = Auth::user()->id;
        $data['address'] = Address::where('user_id', $userId)->first();
        return Theme::view('user_new_address', $data);
    }

    public function add_new_address(Request $request) {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        $userId = Auth::user()->id;

        $addressRecord = Address::where('user_id', $userId);

        if ($addressRecord->count() > 0) {
            $billing = $addressRecord->first();
        } else {
            $billing = new Address;
        }
        $billing->user_id = $userId;
        $billing->first_name = $request->get('firstname');
        $billing->last_name = $request->get('lastname');
        $billing->email = $request->get('email');
        $billing->address = $request->get('address');
        $billing->country = $request->get('country');
        $billing->division = $request->get('region_id');
        $billing->city = $request->get('city');
        $billing->zip_code = $request->get('postcode');
        $billing->mobile = $request->get('mobile');
        $billing->phone = $request->get('phone');
        $billing->save();

        return ['success' => 1, 'address' => $billing];
    }

    public function user_order_history() {
        $userId = Auth::user()->id;
        $data['userOrder'] = User::with('address', 'orders', 'orders.items', 'orders.items.product', 'orders.items.product.media')->find($userId);
//        return $data['userOrder']->address;
//        $data['billing'] = Address::find($data['userOrder']->orders[0]->billing_id);
//        $data['shipping'] = Address::find($data['userOrder']->orders[0]->shipping_id);
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

        $user->name = $request->get('name');
        $user->email = $request->get('email');

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
        $data['products'] = Product::with('media')->where('name', 'like', '%' . $searchString . '%')->paginate($limit);
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
        $order_id = $request->get('tran_id');
        $payment = Payment::where('order_id', $order_id)->first();
        $payment->val_id = $request->get('val_id');
        $payment->bank_tran_id = $request->get('bank_tran_id');
        $payment->amount = $request->get('amount');
        $payment->store_amount = $request->get('store_amount');
        $payment->card_no = $request->get('card_no');
        $payment->tran_date = $request->get('tran_date');
        $payment->currency_type = $request->get('currency_type');
        $payment->currency_amount = $request->get('currency_amount');
        $payment->currency_rate = $request->get('currency_rate');
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
        $order_id = $request->get('tran_id');
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
        $order_id = $request->get('tran_id');
        $payment = Payment::where('order_id', $order_id)->first();
        $payment->bank_tran_id = $request->get('bank_tran_id');
        $payment->amount = $request->get('amount');
        $payment->card_no = $request->get('card_no');
        $payment->tran_date = $request->get('tran_date');
        $payment->currency_type = $request->get('currency_type');
        $payment->currency_amount = $request->get('currency_amount');
        $payment->currency_rate = $request->get('currency_rate');
        $payment->response = json_encode($request->all());
        $payment->status = 4;
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

    public function partners() {
        return Theme::view('partners');
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
        ]);
        $prescription = New ProductInquiry;
        $prescription->full_name = $request->full_name;
        $prescription->inquery_type = 1;
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
            'email' => 'required|email',
            'mobile' => 'required',
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
            Session::flash('success', 'Your query save successfull');
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

}

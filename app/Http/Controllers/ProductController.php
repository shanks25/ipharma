<?php

namespace App\Http\Controllers;

use App\tag;
use Datatables;
use Epharma\Model\Attribute;
use Epharma\Model\AttributeOption;
use Epharma\Model\Category;
use Epharma\Model\Media;
use Epharma\Model\Product;
use Epharma\Model\ProductAttr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;
use Storage;
use URL;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {


        $data['product'] = new Product;
        $data['parCat'] = Category::where('parent', 0)->get();
        $data['tags'] =tag::all();
        return view('product/create2', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {



        $this->validate($request,[

            'discount_amount'=>'integer',
            'discount_percentage'=>'integer',

        ]);




        $product = new Product;
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->type2 = $request->type2;
        $product->sale_price = $request->sale_price;
        $product->regular_price = $request->regular_price;
        $product->discount_amount = ($request->discount_amount) ? $request->discount_amount : 0;
        $product->discount_percentage = ($request->discount_percentage) ? $request->discount_percentage : 0.00;
        $product->min_quantity = $request->min_quantity;
        $product->is_available = $request->is_available;
        // $product->producttype = $request->producttype;
        $product->image = request()->file('file')->storeAs('product')->getClientOriginalName();
        $product->save();

        Carbon::now();
        

        //attach Category
        if ($request->has('category')) {
            $categories = Category::findMany(array_values($request->get('category')));
//            $categories = $request->get('category');
            $product->categories()->saveMany($categories);
        }

        if ($request->has('attributes')) {
            $attributes = AttributeOption::findMany($request->get('attributes'));

            $products_eav = [];
            foreach ($attributes as $attribute) {
                $item = [];
                $item['attribute_id'] = $attribute->attribute_id;
                $item['option_id'] = $attribute->id;
                $item['product_id'] = $product->id;
                $item['value'] = null;
                $products_eav[] = $item;
            }
            ProductAttr::insert($products_eav);

        }

        //attach attribute
//        if ($request->has('attribute')) {
//            $data = [];
//            foreach ($request->get('attribute') as $attribute) {
//
//                //for multiselect
//                if (is_array($request->get('attr_' . $attribute))) {
//
//                    foreach ($request->get('attr_' . $attribute) as $option) {
//                        $data[] = array(
//                            'product_id' => $product->id,
//                            'attribute_id' => $attribute,
//                            'option_id' => $option,
//                            'value' => null
//                        );
//                    }
//                } else {
//
//                    $value = $request->has('attr_text_' . $attribute) ? $request->get('attr_text_' . $attribute) : null;
//
//                    $data[] = array(
//                        'product_id' => $product->id,
//                        'attribute_id' => $attribute,
//                        'option_id' => $request->get('attr_' . $attribute),
//                        'value' => $value
//                    );
//                }
//            }
//
//            ProductAttr::insert($data);
//        }

        return redirect()->back()->with('message','Product Added Successfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $attributes = DB::table('product_eav')
        ->select('attributes.id as attribute_id')
        ->addSelect('attributes.title as attribute')
        ->addSelect('attribute_options.id as id')
        ->addSelect('attribute_options.title as text')
        ->join('attribute_options', 'product_eav.option_id', '=', 'attribute_options.id')
        ->join('attributes', 'product_eav.attribute_id', '=', 'attributes.id')
        ->where('product_eav.product_id', $id)
        ->get();

        $data['attributes'] = [];
        $data['attribute_keys'] = [];
        foreach ($attributes as $attribute) {
            $data['attributes'][$attribute->id] = $attribute->attribute . " : " . $attribute->text;
            $data['attribute_keys'][] = $attribute->id;
        }

        $data['parCat'] = Category::where('parent', 0)->get();
        $data['product'] = Product::with('categories', 'media')->find($id);
//        return $data['product']->categories[0]->id;

        return view('product.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::with('media')->find($id);
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->discount_amount = $request->discount_amount;
        $product->discount_percentage = $request->discount_percentage;
        $product->min_quantity = $request->min_quantity;
        $product->is_available = $request->is_available;
        $product->producttype = $request->producttype;
        
        $product->save();

        $new_media = Media::findMany($request->get('files'));

        //remove old media
        $remove_media_ids = $product->media->diff($new_media)->pluck('id');
        if ($remove_media_ids->toArray()) {
            Media::destroy($remove_media_ids);
        }

        //attach new media
        $product->media()->saveMany($new_media);


        //attach Category
        if ($request->has('category')) {
            $categories = Category::findMany(array_values($request->get('category')));
//            $categories = $request->get('category');
            $product->categories()->sync($categories);
        }


        //attach attribute
        //attach attribute
        ProductAttr::where('product_id', $product->id)
        /* ->whereIn('option_id', $request->get('attributes')) */
        ->delete();

        $attributes = AttributeOption::findMany($request->get('attributes'));

        $products_eav = [];
        foreach ($attributes as $attribute) {
            $item = [];
            $item['attribute_id'] = $attribute->attribute_id;
            $item['option_id'] = $attribute->id;
            $item['product_id'] = $product->id;
            $item['value'] = null;
            $products_eav[] = $item;
        }
        ProductAttr::insert($products_eav);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $photos = Product::with('media')->find($id);
        foreach ($photos->media as $photo) {
            $image = Media::findorFail($photo->id);
            $filename = $image->src;
            Storage::disk('public')->delete($filename);
            $image->delete();
        }
        $item = Product::findOrFail($id);
        $item->delete();
        if ($item) {
            Session::flash('success', 'Product delete sucessfully done');
            return Redirect::route('product.index');
        } else {
            Session::flash('error', 'Product delete failed! Please try again!!!');
            return Redirect::route('product.index');
        }
    }

    public function dataTable() {
        return Datatables::eloquent(Product::with('categories'))->make(true);
    }

    public function productList(Request $request) {
        return Product::where('name', 'like', '%' . $request->q . '%')->paginate();
    }

    public function productConfig() {
        return view('product.config');
    }

    public function attributes(Request $request) {
        $attributes = Attribute::with('options')->findMany($request->get('attributes'));

        $html = '';

        foreach ($attributes as $attribute) {
            $attribute['option_id'] = null;
            $html .= view('attribute.product-attr', $attribute);
        }

        return $html;
    }

    public function allAttributes(Request $request) {
        $keyword = $request->get('q');

        $options = DB::table('attributes')
        ->select('attributes.id as attribute_id')
        ->addSelect('attributes.title as attribute')
        ->addSelect('attribute_options.id as id')
        ->addSelect('attribute_options.title as text')
        ->join('attribute_options', 'attributes.id', '=', 'attribute_options.attribute_id')
        ->where('attribute_options.title', 'like', "%$keyword%")
        ->orWhere('attributes.title', 'like', "%$keyword%")
        ->orderBy('attribute_options.title', 'ASC')
        ->take(15)
        ->get();

        $items = [];
        foreach ($options as $option) {
            $item = [];
            $item['id'] = $option->id;
            $item['text'] = $option->attribute . " : " . $option->text;
            $items[] = $item;
        }

        return ['items' => $items];
    }

}

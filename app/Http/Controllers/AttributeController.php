<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Epharma\Model\Attribute;
use Epharma\Model\AttributeOption;
use Illuminate\Support\Facades\Redirect;

class AttributeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $attr = new Attribute;
        $attr->title = $request->name;
        $attr->type = 'select';
        $attr->save();
        return redirect('admin/attribute');
    }

//    public function store(Request $request)
//    {
//        $attr = new Attribute;
//        $attr->title = $request->name;
//        $attr->type = $request->type;
//        $attr->save();
//
//        if ($request->has('options') && $request->options) {
//            foreach ($request->options as $option){
//                $opt = new AttributeOption;
//                $opt->title = $option;
//                $attr->options()->save($opt);
//            }
//        }
//
//        return redirect('admin/attribute');
//
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data['attribute'] = Attribute::find($id);
        return view('attribute.edit', $data);
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
        $attr = Attribute::find($id);
        $attr->title = $request->title;
        $attr->type = 'select';
        $attr->save();


        if ($request->has('options') && $request->options) {

            AttributeOption::where('attribute_id', $attr->id)->delete();

            foreach ($request->options as $option) {
                $opt = new AttributeOption;
                $opt->title = $option;
                $attr->options()->save($opt);
            }
        }

        return redirect('admin/attribute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function options_datatable(Request $req) {
        $id = $req->id;
        return Datatables::eloquent(AttributeOption::query()->where('attribute_id', $id))->make(true);
    }

    public function datatable() {
        return Datatables::eloquent(Attribute::query())->make(true);
    }

    public function add_attr_option(Request $req) {
        $attr = new AttributeOption();
        $attr->title = $req->name;
        $attr->discount_percentage = ($req->discount_percentage ? $req->discount_percentage : 'NULL');
        $attr->attribute_id = $req->attrId;
        $attr->save();
        return redirect('admin/attribute/' . $req->attrId);
    }

    public function edit_attr_option(Request $req) {
        $id = $req->attrOptionId;
        $attr = AttributeOption::findOrFail($id);
        $attr->title = $req->name;
        $attr->discount_percentage = $req->discount_percentage;
        $attr->save();
        return Redirect::back();
    }

    public function delete_option($id) {
        $option = AttributeOption::findOrFail($id);
        $option->delete();
        if ($option) {
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }

    public function brand_list() {
        return view('attribute.brand_list');
    }

    public function brand_datatable() {
        return Datatables::eloquent(AttributeOption::query()->where('attribute_id', 2))->make(true);
    }
    
    public function edit_brand_attr_option(Request $req) {
        $id = $req->attrOptionId;
        $attr = AttributeOption::findOrFail($id);
        $attr->discount_percentage = $req->discount_percentage;
        $attr->save();
        return Redirect::back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epharma\Model\Category;
use Epharma\Model\Media;
use Session;
use URL;
use Datatables;
use Redirect;
use Storage;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category) {
        $data['categories'] = Category::pluck('name', 'id');
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category) {
        $category = new Category;
        $category->name = $request->name;
        $category->parent = ($request->parent) ? $request->parent : 0;
        $category->discount_percentage = $request->has('discount_percentage') ? $request->get('discount_percentage') : '0.00';
        $category->type = 'category';
        $category->save();

        //attach Image
        $media = Media::findMany($request->get('files'));
        $category->media()->saveMany($media);

        if ($category->id) {
            return ['success' => 1, 'message' => 'Category add sucessfully done'];
        } else {
            return ['success' => 0, 'message' => 'Category add failed! Please try again!!!'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data['categories'] = $this->category->list();
        $data['cat'] = $this->category->get($id);
//        print_r($cat);exit;
        return view('category', $data);
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

        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->discount_percentage = $request->discount_percentage;
        $category->save();

        //attach Image
        $media = Media::findMany($request->get('files'));
        $category->media()->saveMany($media);

        if ($category->id) {
            return ['success' => 1, 'message' => 'Category edit sucessfully done'];
        } else {
            return ['success' => 0, 'message' => 'Category edit failed! Please try again!!!'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $photos = Category::with('media')->find($id);
        foreach ($photos->media as $photo) {
            $image = Media::findorFail($photo->id);
            $filename = $image->src;
            Storage::disk('public')->delete($filename);
            $image->delete();
        }
        $item = Category::findOrFail($id);
        $item->delete();
        if ($item) {
            Session::flash('success', 'Category delete sucessfully done');
            return Redirect::route('category.index');
        } else {
            Session::flash('error', 'Category delete failed! Please try again!!!');
            return Redirect::route('category.index');
        }
    }

    public function dataTable() {
        return Datatables::eloquent(Category::with('parent', 'media'))->make(true);
    }

}

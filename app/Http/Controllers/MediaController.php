<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epharma\Model\Media;
use Storage;
use Datatables;
use Image;

class MediaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('media.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $storagePath = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();

        if ($request->hasFile('file')) {
            $image = new Media;
            $image->type = 'image';
            $image->src = $request->file->store(null, 'public');
            $image->save();

            $thumbnail = Image::make($request->file)->resize(200, 200)->encode();
            Storage::disk('public')->put('tb_' . $image->src, $thumbnail);

            return $image->id;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data['image'] = Media::find($id)->src;
        return view('media.show', $data);
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
        //
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

    public function dataTable() {
        return Datatables::eloquent(Media::query())->make(true);
    }

    public function getImage($id) {
        $image = Storage::disk('public')->get(Media::find($id)->src);
        return Image::make($image)->resize(75, 75)->response();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Epharma\Model\Reviews;
use Redirect;
use Session;
use URL;

class ReviewController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['review'] = District::find($id);
        return view('review.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $review = Reviews::find($request->rId);
        $review->status = $request->status;
        $review->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $review = Reviews::findOrFail($id);
        $review->delete();
        if ($review) {
            Session::flash('success', 'Review delete sucessfully done');
            return Redirect::back();
        } else {
            Session::flash('error', 'Review delete failed! Please try again!!!');
            return Redirect::back();
        }
    }

    public function dataTable() {
        return Datatables::eloquent(Reviews::with('user', 'product')->orderBy('id', 'DESC'))->make(true);
    }

}

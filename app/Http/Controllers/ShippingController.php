<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Epharma\Model\District;
use Epharma\Model\Area;

class ShippingController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('shipping.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $shipping = new District;
        $shipping->description = $request->description;
        $shipping->price = $request->price;
        $shipping->status = $request->status;
        $shipping->save();

        return ['success' => 1, 'shipping' => $shipping];
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
        $data['shipping'] = District::find($id);
        return view('shipping.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $shipping = District::find($id);
        $shipping->shipping_fee = $request->shipping_fee;
        $shipping->save();

        return ['success' => 1, 'shipping' => $shipping];
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
        return Datatables::eloquent(District::query())->make(true);
    }

    public function dhaka_shipping() {
        return view('shipping.dhaka_index');
    }

    public function dhaka_shipping_datatable() {
        return Datatables::eloquent(Area::query()->where('district_id', 1))->make(true);
    }

    public function edit_dhaka_shipping($id) {
        $data['shipping'] = Area::find($id);
        return view('shipping.dhaka_shipping_edit', $data);
    }

    public function update_dhaka_shipping(Request $request) {
        $id = $request->id;
        $shipping = Area::find($id);
        $shipping->shipping_fee = $request->shipping_fee;
        $shipping->save();

        return ['success' => 1, 'shipping' => $shipping];
    }

}

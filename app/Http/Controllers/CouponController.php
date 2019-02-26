<?php

namespace App\Http\Controllers;

use App\Promocode;
use App\deliverytype;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         


            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Promocode::where('promo_code',$request->promo_code)->first();
        if (!$coupon) {
            return redirect()->route('checkout')->withErrors('Invalid Coupon Code');
        }
         session()->put('coupon',[

            'name' => $coupon->promo_code,  
            'discount'=>$coupon->discount,
        ]);

         return redirect()->route('checkout')->with('flash_success','Coupon Code Added Successfully');
    }


        public function deliverytype(Request $request)
    {

        $coupon = deliverytype::where('name',$request->deliverytype)->first();
     
         session()->put('deliverytype',[
             'name' => $coupon->name,
            'deliverycharges'=>$coupon->price,
        ]);

         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

         return redirect()->route('checkout')->with('flash_success','Coupon Code Removed Successfully');
    }
}

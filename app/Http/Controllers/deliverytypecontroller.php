<?php

namespace App\Http\Controllers;

use App\deliverytype;
use Illuminate\Http\Request;

class deliverytypecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $deliverytypes = deliverytype::all(); 
        return view('deliverytype.index',compact('deliverytypes')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('deliverytype.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'name'=>'required', 
          
            
            ]);
    
        $deliverytype = new deliverytype;
         $deliverytype->name = $request->name;
          $deliverytype->price = $request->price;
        $deliverytype->save();
  
        return redirect(route('deliverytype.index'))->with('success','Added Successfully') ;
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
         $deliverytype=deliverytype::find($id); 
        
        return view('deliverytype.edit',compact('deliverytype'));
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
        $deliverytype = deliverytype::find($id);
        $deliverytype->name=$request->name;
        $deliverytype->price=$request->price;
        $deliverytype->save();
          return redirect(route('deliverytype.index'))->with('success','Updated Successfully') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         deliverytype::find($id)->delete();
        return redirect(route('deliverytype.index'))->with('success',' Data Deleted Successfully')  ;
    }
}

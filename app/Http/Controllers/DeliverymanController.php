<?php

namespace App\Http\Controllers;

use App\Deliveryman;
use Illuminate\Http\Request;

class DeliverymanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverymans = Deliveryman::all(); 
        return view('deliveryman.index',compact('deliverymans')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deliveryman.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Deliveryman::create($request->all());
      return redirect(route('deliveryman.index'))->with('message','Deliveryman Added Successfully') ;
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
       $deliveryman=Deliveryman::find($id); 
        
        return view('deliveryman.edit',compact('deliveryman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliveryman $deliveryman)
    {

         $deliveryman->update(request()->all());
         return redirect(route('deliveryman.index'))->with('success','Data updated Successfully')  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deliveryman::find($id)->delete();
        return redirect(route('deliveryman.index'))->with('success',' User Deleted Successfully')  ;
    }
}

<?php

namespace App\Http\Controllers;

use App\deliverysurvey;
use Illuminate\Http\Request;

class DeliverysurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$deliverysurveys = deliverysurvey::all(); 
        return view('deliverysurvey.index',compact('deliverysurveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('deliverysurvey.create');
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
            'question'=>'required', 
             
           
            ]);
        
        
        $deliverysurvey = new deliverysurvey;
       
        $deliverysurvey->question = $request->question;
        
        $deliverysurvey->save();
 

        return redirect(route('deliverysurvey.index'))->with('success','Question is Added Successfully');
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

        $deliverysurvey= deliverysurvey::find($id);
         return view('deliverysurvey.edit',compact('deliverysurvey'));
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
          $this->validate($request,[
            'question'=>'required', 
             
           
            ]);
        
        
        $deliverysurvey = deliverysurvey::find($id);
       
        $deliverysurvey->question = $request->question;
        
        $deliverysurvey->save();
 

        return redirect(route('deliverysurvey.index'))->with('success','Question is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deliverysurvey =  deliverysurvey::where('id',$id)->delete();
            return redirect(route('deliverysurvey.index'))->with('success','Question is Deleted Successfully');
        
    }
}

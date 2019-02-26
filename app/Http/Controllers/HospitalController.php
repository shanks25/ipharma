<?php

namespace App\Http\Controllers;

use App\hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospitals = hospital::all(); 
        return view('hospital.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('hospital.create');
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
        
        
        $hospital = new hospital;
       
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->phone = $request->phone;
        $hospital->website = $request->website;
        $hospital->save();
 

        return redirect(route('hospital.index'))->with('success','Data is Added Successfully');
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

        $hospital= hospital::find($id);
         return view('hospital.edit',compact('hospital'));
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
            'name'=>'required', 
             
           
            ]);
        
        
        $hospital = hospital::find($id);
       
      $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->phone = $request->phone;
        $hospital->website = $request->website;
        
        $hospital->save();
 

        return redirect(route('hospital.index'))->with('success','Data is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $hospital =  hospital::where('id',$id)->delete();
            return redirect(route('hospital.index'))->with('success','Data is Deleted Successfully');
        
    }


}
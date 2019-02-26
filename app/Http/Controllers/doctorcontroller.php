<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\doctor;
use Illuminate\Http\Request;

class doctorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $doctors = doctor::all(); 
        return view('doctor.index',compact('doctors')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('doctor.create') ;
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
             
            ]);
    
        $doctor = new doctor;
        $doctor->name = $request->name;
        $doctor->experience = $request->experience;
        $doctor->refer = $request->refer;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;

        $doctor->picture= request()->file('picture')->store('doctor');
       
        $doctor->save();
  
        return redirect(route('doctor.index'))->with('message','doctor Added Successfully') ;
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
         $doctor=doctor::find($id); 
        
        return view('doctor.edit',compact('doctor'));
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
          
           
            ]);
    
        $doctor = doctor::find($id);
        $doctor->name = $request->name;
          $doctor->experience = $request->experience;
          $doctor->refer = $request->refer;
           $doctor->address = $request->address;
            $doctor->phone = $request->phone;
             $doctor->picture= request()->file('picture')->store('kunal');
        $doctor->save();
  
        return redirect(route('doctor.index'))->with('success','doctor updated Successfully')  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
       doctor::find($id)->delete();
        return redirect(route('doctor.index'))->with('success',' User Deleted Successfully')  ;
    }
}

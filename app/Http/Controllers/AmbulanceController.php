<?php

namespace App\Http\Controllers;

 
use App\Ambulance;  
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {

        $ambulances = Ambulance::all(); 
        return view('ambulance.index',compact('ambulances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('ambulance.create');
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
            'servicename'=>'required', 
             
           
            ]);
        
        
        $ambulance = new Ambulance;
       
        $ambulance->servicename = $request->servicename;
        $ambulance->phone = $request->phone;
        
        $ambulance->save();
 

        return redirect(route('ambulance.index'))->with('success','Data is Added Successfully');
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

        $ambulance= Ambulance::find($id);
         return view('ambulance.edit',compact('ambulance'));
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
            'servicename'=>'required', 
             
           
            ]);
        
        
        $ambulance = Ambulance::find($id);
       
      $ambulance->servicename = $request->servicename;
        $ambulance->phone = $request->phone;
        
        $ambulance->save();
 

        return redirect(route('ambulance.index'))->with('success','Data is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ambulance =  Ambulance::where('id',$id)->delete();
            return redirect(route('ambulance.index'))->with('success','Data is Deleted Successfully');
        
    }


}
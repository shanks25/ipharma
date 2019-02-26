<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use Illuminate\Http\Request;

class pharmacycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $pharmacys = Pharmacy::all(); 
        return view('pharmacy.index',compact('pharmacys')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('pharmacy.create') ;
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
          
            'email'=> 'required|unique:pharmacies',
            'password' => 'required|string|min:6|confirmed',  
            ]);
    
        $pharmacy = new Pharmacy;
         $pharmacy->name = $request->name;
          $pharmacy->address = $request->address;
          $pharmacy->ownername = $request->ownername;
           $pharmacy->ownernumber = $request->ownernumber;
            $pharmacy->managername = $request->managername;
           $pharmacy->managernumber = $request->managernumber;
         $pharmacy->hr = $request->hr;
        $pharmacy->email = $request->email;
        $pharmacy->status = $request->status;
   
         $pharmacy->password= $request['password'] = bcrypt($request->password);

        $pharmacy->save();
  
        return redirect(route('pharmacy.index'))->with('message','Pharmacy Added Successfully') ;
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
         $pharmacy=Pharmacy::find($id); 
        
        return view('pharmacy.edit',compact('pharmacy'));
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
          
            'email'=> 'required',
           
            ]);
    
        $pharmacy = Pharmacy::find($id);
         $pharmacy->name = $request->name;
          $pharmacy->address = $request->address;
          $pharmacy->ownername = $request->ownername;
           $pharmacy->ownernumber = $request->ownernumber;
            $pharmacy->managername = $request->managername;
           $pharmacy->managernumber = $request->managernumber;
         $pharmacy->hr = $request->hr;
        $pharmacy->email = $request->email;
        $pharmacy->status = $request->status;
        $pharmacy->save();
  
        return redirect(route('pharmacy.index'))->with('success','Pharmacy updated Successfully')  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
       Pharmacy::find($id)->delete();
        return redirect(route('pharmacy.index'))->with('success',' User Deleted Successfully')  ;
    }
}

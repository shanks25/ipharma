<?php

namespace App\Http\Controllers;

 
use App\User;
use Illuminate\Http\Request;    

class adminoperatorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('adminoperator.adduser');
    }





     public function __construct()
    {
        $this->middleware('auth:adminoperator');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email'=> 'required|unique:Users',
            'mobile'=> 'required|unique:Users',
            'password' => 'required|string|min:6|confirmed',  
            ]);
        
        $User = new User; 
        $User->name = $request->name;
        $User->address = $request->address;
        $User->status = $request->status;
         $User->email = $request->email;
         $User->mobile = $request->mobile;
         $User->medium = $request->medium;
         $User->password= $request['password'] = bcrypt($request->password); 
         $User->save();
 
         

        return redirect(url('adminoperator/dashboard'))->with('message','User Added Successfully');
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
    public function destroy($id)
    {
        //
    }

    public function dashboard(){
        return view('adminoperator.dashboard');
    }
}

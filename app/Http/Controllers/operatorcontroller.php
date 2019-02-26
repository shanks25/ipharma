<?php

namespace App\Http\Controllers;

use App\adminoperator;
use Illuminate\Http\Request;

class operatorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $adminoperators = adminoperator::all(); 
     return view('operator.index',compact('adminoperators'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('operator.create');
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

        'password' => 'required|string|min:6|confirmed',  
    ]);

      $User = new adminoperator; 
      $User->name = $request->name;

      $User->status = $request->status;
      $User->email = $request->email;

      $User->password= $request['password'] = bcrypt($request->password); 
      $User->save();



      return redirect(url('admin/adminoperator'))->with('message','User Added Successfully');
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
        $adminoperator= adminoperator::find($id);
        return view('operator.edit',compact('adminoperator'));
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
        'email'=> 'required|unique:Users',
        'mobile'=> 'required|unique:Users',
        'password' => 'required|string|min:6|confirmed',  
    ]);

       $User= adminoperator::find($id);
       $User->name = $request->name;
       $User->status = $request->status;
       $User->email = $request->email;
       $User->password= $request['password'] = bcrypt($request->password); 
       $User->save();
 
       return redirect(url('admin/adminoperator'))->with('message','User Updated Successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminoperator =  adminoperator::where('id',$id)->delete();
       return redirect(url('admin/adminoperator'))->with('message','User Updated Successfully');
    }
}

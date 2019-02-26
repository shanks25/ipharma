<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Epharma\Model\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserapiController extends Controller
{
     public function login(Request $request)
     {
         $this->validate($request,[

        "mobile"=>'required',
       'password'=>'required'

      ]);

     	 $finduser= User::where('mobile',$request->mobile)->first();
    	 
     if($finduser && Hash::check($request->password, $finduser->password))
         {

        Auth::login($finduser);
       return response()->json($finduser,200);

         }

   else {
   			return response()->json('User Id or Password is incorrect',401); 
         }

     }

     public function register(Request $request) 
     {
      
   $this->validate($request,[

        "first_name"=>'required',
        "last_name"=>'required',
         "email"=>'required|email|unique:users',
          "mobile"=>'required|unique:users',
          'password'=>'required|confirmed'

      ]);

      try{

       $user = new User;
       $user->first_name =$request->first_name;
       // $user->first_name =$request->first_name;
       $user->last_name =$request->last_name;
       $user->email =$request->email;
       $user->mobile =$request->mobile;
       $user->address =$request->address;
       $user->password =bcrypt($request->password);
      
       $user->status =1;
       $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));

       $user->save();
 
      return response()->json($user,201);  
     	 }

       catch(Exception $e)
       {
          return $e;

       }
     }

  

}

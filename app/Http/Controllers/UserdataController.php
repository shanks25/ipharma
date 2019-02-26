<?php

namespace App\Http\Controllers;

use App\Ambulance;
use App\Http\Controllers\Controller;
use App\Promocode;
use App\comment;
use App\doctor;
use App\feedback;
use App\hospital;
use App\prescription;
use Carbon\Carbon;
use Epharma\Model\Address;
use Epharma\Model\Category;
use Epharma\Model\Order;
use Epharma\Model\Product;
use Epharma\Model\Term;
use Epharma\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserdataController extends Controller
{
 
   public function address(Request $request , User $user) 
    
{
 
 
     	$user = new Address;
       	 $user->user_id =$request->user_id;
       $user->name =$request->first_name;
       $user->last =$request->last_name;
       $user->address =$request->address_1;
       $user->address2 =$request->address_2;
       $user->state =$request->state;
       $user->city =$request->city;
       $user->country =$request->country;
       $user->mobile =$request->phone;
       $user->email =$request->email;
        $user->district =1;
          $user->save();
      
   return     $msg = [
            'success' =>'1',
          'message' =>'Address Stored'
        ];
          
     

     }

public function ambulance()
{
	return response()->json(Ambulance::all());

}

public function coupon()
{
  return response()->json(Ambulance::all());

}

public function hospital()
{
  return response()->json(hospital::all());

}

public function product(Request $request)
{
  $product = Product::where('id',$request->product_id)->get();
  if ($product) {
  return response()->json($product);
  }
  else{
      return 'product not found';
  }

}

public function checkcoupon(Request $request)
{

   $today=Carbon::today()->format('Y-m-d');
 
   $Promocode = Promocode::where('promo_code',$request->promo_code)->first();
 
     if (!$Promocode) {
       return  $msg = [
            'error' =>'404',
          'message' =>'coupon not found'
        ];
  }elseif ($Promocode->expiration < $today) {
    return     $msg = [
            'error' =>'0',
          'message' =>'coupon expired'
        ];
  }else{
  return response()->json($Promocode);
  }
 
}


public function producthome()
{
    $a =Product::where('type2','featured')->get() ;
 
    $b =Product::where('type2','seasonal')->get() ;

return  ['featured_products'=>$a,
         'seasonal_products'=> $b
        ];
}




public function order(Order $order, Request $request)
{
 

  return response()->json(Order::where('id',$request->user_id));
 
}


public function shipping_list(Request $request)
{
 

 $finduser= Address::where('user_id',$request->user_id)->get();
 if ($finduser) {
 return  ['success'=>'1',
         'result'=> $finduser
        ];
 }
 else
 {
      return 'User not Found';  
 }
}



public function orderhistory(Request $request)
{
     $orderhistory =Order::where('user_id',$request->user_id)->get(); 
     
     if ($orderhistory) {
  return response()->json($orderhistory,201);
}
else{
  return 'No Order Found';
}
 
}

public function feedback(Request $request)
{
  $this->validate($request,[

    'feedback'=>'required'

  ]);

  
  $feedback = new feedback;
  $feedback->user_id = $request->user_id;
  $feedback->feedback = $request->feedback;
  $feedback->save();

 
  return response()->json(['success' =>1],200);
 
}

public function save_prescription(Request $request)
{
	$this->validate($request,[

    'user_id'=>'required',
    'shipping_address'=>'required|',
    'prescription'=>'required|file',
 

	]);

  
	$prescription = new prescription;
	$prescription->user_id = $request->user_id;
  $prescription->shipping_address = $request->shipping_address;
	$prescription->prescription = request()->file('prescription')->store('prescription');
	$prescription->save();

 
	return response()->json(['success' =>1],200);
 
}

public function comment(Request $request)
{
  $this->validate($request,[

    'comment'=>'required'

  ]);

  
  $comment = new comment;
  $comment->user_id = $request->user_id;
  $comment->comment = $request->comment;
  $comment->save();

 
  return response()->json(['success' =>1],200);
 
}



public function health_checkup(Request $request)
{


 if ($request->has('user_id')) {
   # code...
 }
return response()->json(doctor::all());
   
 
}

public function categories()
{

 return Category::all();
}

 

public function profile_update(Request $request)

{  



 $user = User::where('id',$request->user_id)->first();    


                                                   
             if($request->has('mobile')){
                $user->mobile = $request->mobile;
            }
            if($request->has('first_name')){
                $user->first_name = $request->first_name;
            } 
              if($request->has('last_name')){
                $user->last_name = $request->last_name;
            }
            
            if($request->has('email')){
                $user->email = $request->email;
            }

             if($request->has('address')){
                $user->address = $request->address;
            }
            
            $user->save();

              return response()->json(['msg'=>'User Updated Successfully'],200);

 
}

public function user_details(Request $request)

{
   $kunal= User::where('id',$request->user_id)->first() ;
    if ($kunal) {
      
           return $kunal;
    }
    else
    {
        $msg = [
          'message' =>'User does not exist'
        ];
      
        return response()->json($msg,404);
    }         
}



public function categorywiseproduct(Request $request)
{

    return Term::where('id',$request->id)->first()->products;
   
} 
 
 
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epharma\Model\Order;
use Epharma\Model\Address;
use Epharma\Model\Payment;
use Epharma\Model\User;
use Auth;
use Datatables;
use PDF;
use App\Notifications\HoldOrder;
use App\Notifications\SuccessOrder;
use App\Notifications\CancelOrder;
use Illuminate\Notifications\Notifiable;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['totalOrder'] = Order::count();
        $data['completeOrder'] = Order::where('status', 2)->count();
        $data['prossOrder'] = Order::where('status', 0)->count();
        $data['holdOrder'] = Order::where('status', 1)->count();
        $data['cancelOrder'] = Order::where('status', 3)->count();
        return view('order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      $data['order'] = Order::first();
           $data['billing'] = Address::with('zilla', 'upazilla')->find($data['order']->billing_id);
               $data['shipping'] = Address::with('zilla', 'upazilla')->find($data['order']->shipping_id);
        return view('order.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // return $request->products;

        $prices = array_map(function($product) {
            return $product['price'];
        }, $request->products);

        $order = new Order;
        $order->products = json_encode($request->products);
        $order->total = array_sum($prices);
        $order->user_id = Auth::user()->id;
        $order->save();


        foreach ($request->products as $product) {
            $item = new OrderItems;
            $item->order_id = $order->id;
            $item->product_id = $product->id;
            $item->name = $product->name;
            $item->qty = $product->qty;
            $item->price = $product->subtotal;
            $item->save();
        }


        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id) {
         $data['order'] = Order::with('user', 'items', 'payment', 'items.product')->find($id);
        $data['billing'] = Address::with('zilla', 'upazilla')->find($data['order']->billing_id);
        $data['shipping'] = Address::with('zilla', 'upazilla')->find($data['order']->shipping_id);
        return view('order.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        if ($order) {
            $sms = $this->smsGateway($request->sms_mobile, $request->id, $request->status);
            $notify = $this->notifyGateway($request->id, $request->status);
            return ['success' => 1, 'message' => 'Order update sucessfully done'];
        } else {
            return ['success' => 0, 'message' => 'Order update failed! Please try again!!!'];
        }
    }

    public function smsGateway($mobile, $orderId, $status) {
        if ($status == 1) {
            $text = "Your iPharma24.com.bd Order #$orderId kept on hold since we are unable to reach you via phone for verification or unavailability of items. Helpline: 01701290890";
        } elseif ($status == 2) {
            $text = "Your iPharma24.com.bd, Order #$orderId has been delivered to your location. We are happy to serve you and saved your valuable time. Helpline: 01701290890";
        } elseif ($status == 3) {
            $text = "Accept our sincere apology, your iPharma24.com.bd, Order #$orderId has been cancelled. Do not hesitate to email: info@ipharma24.com.bd or Enquiry: 01701290890";
        } else {
            $text = "Thank you for placing order #$orderId. You will receive a phone call for verification & price/delivery confirmation. Appreciate your co-operation. iPharma24.com.bd";
        }
        $url = 'http://api.rankstelecom.com/api/v3/sendsms/json';

        $ch = curl_init($url);
        $data = array(
            'authentication' => array('username' => 'LIMITLESS_SL', 'password' => 'epharma@4321'),
            'messages' => array(array('sender' => '8804445600458', 'text' => '' . $text . '', 'recipients' => array(array('gsm' => '' . $mobile . ''))
                ))
        );
        $jsondataencode = json_encode($data);
        CURL_SETOPT($ch, CURLOPT_POST, 1);
        CURL_SETOPT($ch, CURLOPT_POSTFIELDS, $jsondataencode);
        CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('content-type:application/json'));
        CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = CURL_EXEC($ch);
    }

    public function notifyGateway($orderId, $status) {
        $notifyInfo = $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($orderId);
        if ($status == 1) {
            if (isset($data['order']->user->email)) {
                $emailUserId = $data['order']->user->id;
                User::find($emailUserId)->notify(new HoldOrder($notifyInfo));
            } else {
                $emailUserId = $data['order']->billingAttr->id;
                Address::find($emailUserId)->notify(new HoldOrder($notifyInfo));
            }
        } elseif ($status == 2) {
            if (isset($data['order']->user->email)) {
                $emailUserId = $data['order']->user->id;
                User::find($emailUserId)->notify(new SuccessOrder($notifyInfo));
            } else {
                $emailUserId = $data['order']->billingAttr->id;
                Address::find($emailUserId)->notify(new SuccessOrder($notifyInfo));
            }
        } else {
            if (isset($data['order']->user->email)) {
                $emailUserId = $data['order']->user->id;
                User::find($emailUserId)->notify(new CancelOrder($notifyInfo));
            } else {
                $emailUserId = $data['order']->billingAttr->id;
                Address::find($emailUserId)->notify(new CancelOrder($notifyInfo));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function dataTable() {
        return Datatables::eloquent(Order::with('user', 'payment')->orderBy('id', 'DESC'))->make(true);
    }

    public function invoice($order_id) {
        $data['order'] = Order::with('user', 'items', 'payment', 'items.product', 'items.product.typeAttrOptions.attributeValue', 'items.product.brandattrOptions.attributeValue', 'billingAttr', 'billingAttr.zilla', 'billingAttr.upazilla')->find($order_id);
        $pdf = PDF::loadView('layouts.invoice', $data);
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');
    }

    public function payment_status(Request $request, $id) {
        $payment = Payment::where('order_id', $id)->first();
        $payment->status = $request->payment_status;
        $payment->save();

        if ($payment) {
            return ['success' => 1, 'message' => 'Payment status update sucessfully'];
        } else {
            return ['success' => 0, 'message' => 'Payment status update failed! Please try again!!!'];
        }
    }

}

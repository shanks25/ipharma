<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Epharma\Model\Callme;
use Epharma\Model\Order;
use Auth;
use Datatables;
use Theme;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('welcome');
    }

    public function todayOrderDatatable() {
        $today = date('Y-m-d');
        return Datatables::eloquent(Order::with('user', 'payment')->whereDate('created_at', $today)->orderBy('id', 'DESC'))->make(true);
    }

    public function callmeDatatable() {
        return Datatables::eloquent(Callme::query()->orderBy('id', 'DESC'))->make(true);
    }

    public function editCallStatus(Request $request) {
        $id = $request->id;
        $callMe = Callme::find($id);
        $callMe->status = $request->status;
        $callMe->save();
        if ($callMe) {
            return redirect('admin')->with('message', 'Caller update sucessfully done.');
        } else {
            return redirect('admin')->with('message', 'Caller update failed! Please try again!!!');
        }
    }

}

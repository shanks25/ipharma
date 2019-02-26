<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Datatables;
use Epharma\Model\ProductInquiry;
use Theme;
use Illuminate\Support\Facades\Hash;

class OthersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['title'] = 'Request Product List';
        return view('query.index', $data);
    }

    public function inquiry_delete($id) {
        return "Hello";
        $option = ProductInquiry::findOrFail($id);
        $option->delete();
        if ($option) {
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }

    public function dataTable() {
        return Datatables::eloquent(ProductInquiry::query()->where('inquery_type', 1))->make(true);
    }

    public function prescription() {
        $data['title'] = 'Prescription List';
        return view('query.prescription', $data);
    }

    public function prescription_dataTable() {
        return Datatables::eloquent(ProductInquiry::query()->where('inquery_type', 2))->make(true);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epharma\Model\Category;
use Epharma\Model\Option;
use Session;
use URL;


class MenuController extends Controller {

    public function index() {
    	$data['menu'] = Option::valueOf('menu')->count() 
    			? Option::valueOf('menu')->first()->value 
    			: "[]";
        $data['categories'] = Category::all();
        return view('menu.index', $data);
        
    }

    public function store(Request $request)
    {
    	Option::updateOrCreate(['key' => 'menu'],['value' => $request->menu]);
    }

}

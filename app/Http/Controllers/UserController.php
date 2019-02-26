<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Datatables;
use Epharma\Model\User;
use Epharma\Model\Role;
use Theme;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['roles'] = Role::pluck('name', 'id');
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        if ($request->status == 1) {
            $user->status = 2;
        } else {
            $user->status = $request->status;
        }
        $user->save();

        $roles = Role::findMany(array_values($request->get('role')));
        $user->roles()->saveMany($roles);

        return ['success' => 1, 'user' => $user];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['userInfo'] = User::with('roles')->find($id);
        $data['roles'] = Role::pluck('name', 'id');
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if ($request->status == 1) {
            $user->status = 2;
        } else {
            $user->status = $request->status;
        }
        if (!Input::get('password') == '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();


        //attach Category
        $roles = Role::findMany(array_values($request->get('role')));
        $user->roles()->sync($roles);

        return ['success' => 1, 'user' => $user];
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
        return Datatables::eloquent(User::query())->make(true);
    }

}

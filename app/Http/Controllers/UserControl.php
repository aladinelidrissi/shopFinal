<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


/**
 * Index that returns all users.
 *
 */

class UserControl extends Controller
{

    public function usersIndex(){
        $users = User::all();
        return view('admin.users',['users' => $users]);
    }
    public function newUser(){
        return view('admin.createuser');
    }
    protected function deleteUser($id)
    {
        User::destroy($id);
        return redirect('/admin/users');
    }
    protected function editUser($id)
    {
        $user = User::find($id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');

        if (Input::has('role')) {
            $user->role = Input::get('role');
        }else{
            $user->role = Input::get('role','buyer');
        }

        $user->save();

        return redirect('/admin/users');
    }
    public function goEdit(){
        return view('auth.edit');
    }
    protected function selfEdit($id)
    {
        $user = User::find($id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        if (Input::has('password')){
            $user->password = bcrypt(Input::get('password'));
        }

        $user->save();

        return redirect()->back();
    }
}

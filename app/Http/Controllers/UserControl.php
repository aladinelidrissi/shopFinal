<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

use App\Http\Controllers\Controller;
use Request;

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
        
        $user  = User::find($id);
        $user->name =Request::input('name');
        $user->email =Request::input('email');
        $user->role =Request::input('role');

        $user->save();

        return redirect('/admin/users');
    }
}
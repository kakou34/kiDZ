<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loadPage(){
        $admins = User::all();
        return view('CMS.cmsadmins', [
            'admins' => $admins,
        ]);
    }
    //function to add a new admin to the DB
    public function storeAdmin() {
        $data = request()->validate ([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required'
        ]);

        $admin = new User();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);
        $admin->save();
        return back();
    }

    //funtion to delete an existing Admin from the database
    public function deleteAdmin($id) {
        $result = User::destroy($id);
        return back();
    }
}

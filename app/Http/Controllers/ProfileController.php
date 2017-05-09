<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        print_r($user);
    }

    public function userInfo(Request $request)
    {
//        $user = $request->user();
        $id = $request->user();
        print_r($id);
    }

    public function checkUser()
    {
        if (Auth::check()) {
            echo 'userLogin';
        } else {
            echo 'notLogged';
        }
    }

}

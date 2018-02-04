<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function postLogin(Request $request)
    {
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    		{
    			$user=Auth::user();
    			echo "Dang nhap thanh cong";
    			echo $user->username;
    		}
    		else
    		{
    			echo "Dang nhap that bai";
    		}
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __contruct()
    {
    	$this->DangNhap();
    }


    //Kiem tra dang nhap chua neu dang nhap roi thi share view
    function DangNhap()
    {
    	if(Auth::check())
    		{
    			view()->share('user',Auth::user());
    		}
    }
}

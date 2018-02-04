<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tin;
use App\Products;
class MyController extends Controller
{
    //
    public function postForm(Request $request)
    {
    	DB::table('users')->insert(['full_name'=>$request->username,'email'=>$request->username,'password'=>bcrypt($request->password)]);
    	
    }

    public function postSignup(Request $request)
    {
    	DB::table('users')->insert(['full_name'=>$request->full_name,'email'=>$request->email,'password'=>bcrypt($request->password),'phone'=>$request->phone]);
    	echo "Dang ky thanh cong";
    }

    public function postLogin(Request $request)
    {
    	 if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            
            $user=Auth::user();
            return view('user',['user'=>$user]);
        }
        else
        {
        	$thongbao='Dang nhap khong thanh cong';
        	return view('login',['thongbao'=>$thongbao]);
        }
    }

    public function logout()
    {
    	Auth::logout();
    	return view('login');
    }

    public function danhsach()
    {
    	$danhsach=tin::paginate(2);
    	return view('danhsach',['danhsach'=>$danhsach]);
    }

    public function products(){
        $danhsach=Products::orderBy('id_type')->paginate(5);
        return view('products',['danhsach'=>$danhsach]);
    }

    public function Tin()
    {
        $tin=Tin::paginate('5');
        return view('tin',['tin'=>$tin]);
    }
}

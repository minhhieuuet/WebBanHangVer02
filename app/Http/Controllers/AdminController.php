<?php

namespace App\Http\Controllers;
use App\TypeProducts;
use Illuminate\Http\Request;
use App\Products;
use App\Bills;
use App\Customer;
class AdminController extends Controller
{
    //

    public function theloai(){
    	$theloai=TypeProducts::paginate(5);
    	return view('admin.category',['theloai'=>$theloai]);
    }
    //San pham
    public function sanpham()
    {
    	$sanpham=Products::orderBy('id','DESC')->paginate(10);
    	return view('admin.sanpham',['sanpham'=>$sanpham]);
    }

    public function xoaSP($id)
    {
    	Products::destroy($id);
    	return back();
    }
    
    //Loai san pham
    public function themLSP()
    {
    	$loaisp=new TypeProducts;
    }

    public function xoaLSP($id)
    {
    	TypeProducts::destroy($id);
    	return back();
    }

    public function them()
    {
    	$loaisp=TypeProducts::get();
    	return view('admin.themLSP',['loaisp'=>$loaisp]);
    }

    //Don hang

    public function donhang()
    {
    	$donhang=Bills::paginate(10);
    	return view('admin.donhang',['donhang'=>$donhang]);
    }

    //Khach hang

    public function khachhang()
    {
    	$khachhang=Customer::orderBy('id','ASC')->paginate(10);
    	return view('admin.khachhang',['khachhang'=>$khachhang]);
    }
}

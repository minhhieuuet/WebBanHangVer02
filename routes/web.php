<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tin','MyController@Tin');

Route::get('login',function(){
	return view('login');
});


//Category
Route::prefix('admin')->group(function(){
	Route::get('/',function(){
		return redirect()->route('loai-san-pham');
	});

	Route::get('loai-san-pham','AdminController@theloai')->name('loai-san-pham');
	Route::get('loai-san-pham/xoa/{id}','AdminController@xoaLSP');
	Route::get('loai-san-pham/them', 'AdminController@them');
	Route::post('themLSP','AdminController@themLSP');

	Route::get('san-pham','AdminController@sanpham')->name('san-pham');
	Route::get('san-pham/xoa/{id}','AdminController@xoaSP');

	Route::get('don-hang','AdminController@donhang');

	Route::get('khach-hang','AdminController@khachhang');
});


Route::post('postLogin','LoginController@postLogin')->name('postLogin');
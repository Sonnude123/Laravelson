<?php

use Illuminate\Support\Facades\Route;

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
Route::get('KhoaHoc',function(){
return" Xin chao bạn Sơn đẹp trai 20cm";
});
Route::get('HoangSon/Laravel',function(){
echo"Hoàng Sơn học php laravel";
});
//Truyền tham số
Route::get('Hoten/{ten}',function($ten){
	echo" tên của bạn là:".$ten;
});
Route::get('Laravel/{ngay}',function($ngay){
	echo "HoangSon sinh ngày".$ngay;
});
Route::get('hoangson/{ten}',function($ten){
	echo"chào son sinh ngày : ".$ten;
})->where(['so'=>'[0-9]{2-11}']);

// Định danh 
Route::get('route1',['as'=>'MyRoute',function(){
	echo"xin chao son";
}]);

Route::get('Goiten',function(){
	return redirect()->route('MyRoute');
});
//group
Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo"user1";
	});
	Route::get('User2',function(){
		echo"user2";
	});
});


//Gọi controller
Route::get('GoiController','MyController@Chaoson');

Route::get('ten/{khoa}','MyController@lop');

//URL
Route::get('Myrequest','MyController@GetURL');


//gửi nhận dữ liệu với request
Route::get('getForm',function(){
	return view('postForm');
});

Route::post('postForm',['as'=>'postForm','users'=>'MyController@postForm']);


//Cookies
Route::get('setcookie','MyController@setcookie');
Route::get('getcookie','MyController@getcookie');


//upload file
Route::get('uploadFile',function(){
	return view('postfile');
});
Route::post('postfile',['as'=>'postfile','users'=>'MyController@postfile']);

//json
Route::get('getJson','MyController@getJson');
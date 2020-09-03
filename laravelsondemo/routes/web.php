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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');




Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
      Route::group(['prefix'=>'theloai'],function(){
      	//admin/theloai/..
      Route::get('danhsach','TheLoaiController@getDanhsach');
      
      Route::get('sua/{id}','TheLoaiController@getSua');
      Route::post('sua/{id}','TheLoaiController@postSua');

      Route::get('them','TheLoaiController@getThem');
      Route::post('them','TheLoaiController@postThem');

      Route::get('xoa/{id}','TheLoaiController@getXoa');

      });
     

      Route::group(['prefix'=>'loaitin'],function(){
      	//admin/loaitin/..
     Route::get('danhsach','LoaiTinController@getDanhsach');
      
      Route::get('sua/{id}','LoaiTinController@getSua');
      Route::post('sua/{id}','LoaiTinController@postSua');

      Route::get('them','LoaiTinController@getThem');
      Route::post('them','LoaiTinContr	oller@postThem');

      Route::get('xoa/{id}','LoaiTinController@getXoa');



      });
         Route::group(['prefix'=>'tintuc'],function(){
      	//admin/loaitin/..
      Route::get('danhsach','TinTucController@getDanhsach');
      
      Route::get('sua/{id}','TinTucController@getSua');
      Route::post('sua/{id}','TinTucController@postSua');

      Route::get('them','TinTucController@getThem');
      Route::post('them','TinTucController@postThem');

      Route::get('xoa/{id}','TinTucController@getXoa');


      });

       Route::group(['prefix'=>'ajax'],function(){
      Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
       });


       Route::group(['prefix'=>'user'],function(){
      	//admin/loaitin/..
      Route::get('danhsach','UserController@getDanhsach');
      
      Route::get('sua/{id}','UserController@getSua');
      Route::post('sua/{id}','UserController@postSua');

      Route::get('them','UserController@getThem');
      Route::post('them','UserController@postThem');

      Route::get('xoa/{id}','UserController@getXoa');


      });
     });

      Route::get('trangchu','PagesController@trangchu');

      Route::get('lienhe','PagesController@lienhe');







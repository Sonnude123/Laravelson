<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class MyController extends Controller
{
    public function Chaoson(){
    	echo" chào sơn nhá";
    }
    public function lop($khoa){
    	echo"lop : ".$khoa;
    	return redirect()->route('MyRoute');
    }
    public function GetURL(Request $request){
    	return $request->url();
    }
    public function postForm(Request $request){
    	echo $request->HoTen;
    }
    public function setcookie(){
    	$response = new Response();
    	$response->withCookie('KhoaHoc','Laravel-KhoaPham',1);
    	echo "set cookie";
    	return $response; 
    }
    public function getCookie(Request $request){
    	return $request->cookie('KhoaHoc');

    }

    public function postfile(Request $request)
    {
           if($request->hasFile('myFile'))
    {
	echo"da co file";
    }
    else{
    	echo " chua có file";
    }
  }
public function getJson()
   {
    array = ('Laravel','php','.net','java');
    return response()->json($array);
   }

   public function Time($t){
    return view('myView',['t'=>$t]);
   }
   public function blade($str){
    if($str =="laravel")
        return view('pages.laravel');

   }
}

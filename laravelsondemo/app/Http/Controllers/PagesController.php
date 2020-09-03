<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class PagesController extends Controller
{
       // share the loại cho tất cả các function thuộc pagescontroller
//     function __construct(){
//     	$theloai = TheLoai::all();
//     	view()->share('theloai',$theloai);
// }
    
    function trangchu(){
    	$theloai = TheLoai::all();
    	return view('pages.trangchu',['theloai'=>$theloai]);

    }
    function lienhe(){
    	$theloai = TheLoai::all();
    	return view('pages.lienhe',['theloai'=>$theloai]);
    }
}

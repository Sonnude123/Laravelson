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


// //view
// Route::get('Time/{t}','MyController$Time');


//blade template
Route::get('blade',function(){
return view('pages.laravel');
});


Route::get('BladeTemplate/{str}','MyController@blade');


// //Database
// Route::get('database',function(){
// 	Schema::create('diem',function($table){
// $table->increments('id');//tang dan id
// $table->string('diem',30);

// 	});
// 	echo"đã thực hiện tạo bảng";
// });


//queryBuilder
Route::get('qb/get',function(){
	$data = DB::table('sinhvien')->get();//lấy dữ liệu 
	// var_dump($data);
	foreach($data as $row){
		foreach($row as $key=>$value){
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}	
});

//select * from users where id =2
Route::get('qb/where',function(){
	$data = DB::table('sinhvien')->where('id','=',2)->get();//lấy dữ liệu 
	// var_dump($data);
	foreach($data as $row){
		foreach($row as $key=>$value){
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}	
});


//select id, tên sv
Route::get('qb/select',function(){
	$data = DB::table('sinhvien')->select(['id','tensv'])->where('id',3)->get();
	// var_dump($data);
	foreach($data as $row){
		foreach($row as $key=>$value){
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}	
});
//select name as ho ten

Route::get('qb/raw',function(){
	$data = DB::table('sinhvien')->select(DB::raw('id,tensv as hoten'))->where('id',3)->get();
	// var_dump($data);
	foreach($data as $row){
		foreach($row as $key=>$value){
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}	
});

//order by
Route::get('qb/orderby',function(){
	$data = DB::table('sinhvien')->select(DB::raw('id,tensv as hoten'))->where('id','>',1)->orderby('id','desc')->get();
	// var_dump($data);
	foreach($data as $row){
		foreach($row as $key=>$value){
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}	
});

//model
Route::get('model/save',function(){
	$user = new App\User();
	$user-> tensv ="Mai";
	$user-> lop="hht";

	$user->save();
	echo"đã thwucj hieemnj save";
});

Route::get('taocot',function(){
	Schema::table('diem',function($table){
		$table->integer('diem_tn')->unsigned();
	});
});


Route::get('taocot1',function(){
	Schema::table('diemtongket',function($table){
		
		$table->string('diemvan')->unsigned();
		$table->integer('diemhp')->unsigned();
		$table->integer('diemht')->unsigned();
	});
});


//middleware

Route::get('diem',function(){
	echo"bạn đã đủ điểm";
})->middleware('Mymiddle')->name('diem');
Route::get('loi',function(){
	echo"ban chua đủ diểm";
})->name('loi');



Route::get('nhapdiem',function(){
return view('nhapdiem');
})->name('nhapdiem');







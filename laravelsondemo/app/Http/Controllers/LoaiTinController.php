<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);

    }
    public function getThem()
    {
        $theloai=TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);

    }
        public function postThem(Request $request){
            $this->validate($request, 
            [
                'Ten'=>'required|unique:LoaiTin,Ten|min:1|max:100',
                'TheLoai'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên loại tin',
                'Ten.unique'=>'Ten loại tin đã tồn tại',
                'Ten.min'=>'Tên loại tin phải có từ 1 đến 100 ký tự',
                'Ten.max'=>'Tên loại tin phải có từ 1 đến 100 ký tự',
                'TheLoai.required'=>'bạn chưa chọn thể loại' 
            ]);
    $loaitin =  new LoaiTin;
    $loaitin->Ten = $request->Ten;
    $loaitin->TenKhongDau = changeTitle($request->Ten);
    $loaitin->idTheLoai = $request->TheLoai;
    $loaitin->save();

    return redirect('admin/loaitin/them')->with('thongbao','Bạn đã thêm thành công');

        }
        
    public function getSua($id){
        $theloai = LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin]);


    }
    public function postSua(Request $request,$id){

    
    }
    public function getXoa($id){
        
}
}
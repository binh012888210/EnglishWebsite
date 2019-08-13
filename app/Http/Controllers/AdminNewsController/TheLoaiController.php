<?php

namespace App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem()
    {
        return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [ 
                'Ten.required'=>'Ban chua nhap ten the loai',
                'Ten.uique' => 'Ten the loai da ton tai',
                'Ten.min'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
                'Ten.max'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
            ]);
            $theloai = new TheLoai;
            $theloai->Ten=$request->Ten;
            $theloai->TenKhongDau=changeTitle($request->Ten);
            $theloai->save();

            return redirect('admin/theloai/them')->with('thongbao',
            'Them thanh cong');

    }
    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]); 
    }
    public function postSua(Request $request,$id )
    {
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100|unique:TheLoai,Ten,'.$id
            ],
            [
                'Ten.required' => 'ban chua nhap ten the loai',
                'Ten.unique' => 'Ten the loai da ton tai',
                'Ten.min'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
                'Ten.max'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
            ]
            );
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau=changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thongbao'
        ,'Sua thanh cong');
    }
    public function getXoa($id)
    {
        $theloai= TheLoai::find($id);
        $loaitin = LoaiTin::where('idTheLoai',$id); //Tìm các loai tin của the loai
        $loaitin2 = LoaiTin::where('idTheLoai',$id)->get(); //Tìm các loai tin của the loai
        foreach($loaitin2 as $lt)
        {
            $tintuc = TinTuc::where('idLoaiTin',$lt->id); //Tìm các tin tuc của the loai tin
            $tintuc->delete();
        }
        $loaitin->delete(); //Xóa các loai tin của theloai
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao',
        'Ban da xoa thanh cong');
    }
  
}

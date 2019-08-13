<?php

namespace App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai],['loaitin'=>$loaitin]);    
    }
    public function postThem(Request $request)
    {
       $this->validate($request,
       [
           'LoaiTin'=>'required',
           'TieuDe'=>'required|min:3|unique:Tintuc,TieuDe',
           'TomTat'=>'required',
           'NoiDung'=>'required',
           'Hinh' => 'image|mimes:jpg,png,jpeg|max:2000'
       ],
       [
           'LoaiTin.required'=>'Ban chu ahcon loai tin',
           'TieuDe.required'=>'Ban chua nhap tieu de',
           'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
           'TieuDe.unique'=>'Tieu de da ton tai',
           'TomTat.required'=>'Ban chua nhap tom tat ',
           'NoiDung.required'=>'Ban chua nhap noi dung',
           'Hinh.image'=>'Ban chi duoc chon file hinh',
           'Hinh.mimes'=>'File hinh co dinh dang jpg,png,jpeg'
       ]);
       $tintuc = new TinTuc;
       $tintuc->TieuDe=$request->TieuDe;
       $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
       $tintuc->idLoaiTin=$request->LoaiTin;
       $tintuc->TomTat=$request->TomTat;
       $tintuc->NoiDung=$request->NoiDung;
       $tintuc->NoiBat=$request->NoiBat;
       $tintuc->SoLuotXem=0;

       if($request->hasFile('Hinh'))
       {
            $file=$request->File('Hinh');
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
       }
       else
       {
           $tintuc->Hinh= "";
       }
       $tintuc->save();

       return redirect('admin/tintuc/them')->with('thongbao','Ban da them tin thanh cong');
    }
    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc =TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id )
    {
        $tintuc =TinTuc::find($id);
        $this->validate($request,
        [
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe,'.$id,
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh' => 'image|mimes:jpg,png,jpeg'
        ],
        [
            'LoaiTin.required'=>'Ban chu ahcon loai tin',
            'TieuDe.required'=>'Ban chua nhap tieu de',
            'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
            'TieuDe.unique'=>'Tieu de da ton tai',
            'TomTat.required'=>'Ban chua nhap tom tat ',
            'NoiDung.required'=>'Ban chua nhap noi dung',
            'Hinh.image'=>'Ban chi duoc chon file hinh',
            'Hinh.mimes'=>'File hinh co dinh dang jpg,png,jpeg'
        ]);
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;

        if($request->hasFile('Hinh'))
        {
            $file=$request->File('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Ban chi duoc chon file co duoi la jpg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            if(!empty($tintuc->Hinh))
                unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh=$Hinh;
        }
        if($request->XoaHinh=='Deleted')
        {    
            $tintuc->Hinh= "";
            if(!empty($tintuc->Hinh))
                unlink("upload/tintuc/".$tintuc->Hinh);
        }
        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Ban da sua tin thanh cong');
    }
    public function getXoa($id)
    {
       $tintuc = TinTuc::find($id);
       $comment = Comment::where('idTinTuc',$id);
       $comment->delete();
       $tintuc->delete();

       return redirect ('admin/tintuc/danhsach')->with('thongbao','Xoa thanh cong');
    }

    public function getXoaComment($id,$idTinTuc)
    {
       $comment = Comment::find($id);
       $comment->delete();

       return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Xoa comment thanh cong');
    }
  
}

<?php

namespace App\Http\Controllers\PublicController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AddViewCountToTinTuc;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests;
use App\LoaiTin;
use App\TinTuc;

class NewsPagesController extends Controller
{
    use AddViewCountToTinTuc;

    function trangchu ()
    {
        return view('newsPages.trangchu');
    }
    function lienhe()
    {
        return view('newsPages.lienhe');
    }
    function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('newsPages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function getallloaitin($id)
    {
        $theloai = TheLoai::find($id);

        $loaitin = LoaiTin::select('id')->where('idTheLoai',$id)->get();
        $tintuc = TinTuc::whereIn('idLoaiTin',$loaitin)->paginate(5);
        //Chú ý: whereIn có thể so sánh một số với một mảng

        $loaitin = new LoaiTin;
        $loaitin->Ten = 'Lấy tất cả loại tin của thể loại '.$theloai->Ten;
        return view('newsPages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $this->addViewCount($id);
        $tinlienquan = TinTuc::where('idLoaiTin','=',$tintuc->idLoaiTin)->where('id','!=',$id)->take(3)->get();
        return view('newsPages.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan]);
    }
}

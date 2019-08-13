<?php

namespace App\Http\Controllers\AdminGrammarController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Grammar;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\GrammarExercisePage;
use App\Comment;
use App\UserPoint;

use Illuminate\Support\Facades\Auth;//Dang nhap

class GrammarLessonPageController extends Controller
{
    //
    public function getDanhSach()
    {
        $grammarlessonpage = GrammarLessonPage::orderBy('id','DESC')->get();
        return view('admin.grammarlessonpage.danhsach',['grammarlessonpage'=>$grammarlessonpage]);
    }
    public function getThem()
    {
        $grammar = Grammar::all();
        $grammarlesson = GrammarLesson::all();
        return view('admin.grammarlessonpage.them',['grammar'=>$grammar],['grammarlesson'=>$grammarlesson]);    
    }
    public function postThem(Request $request)
    {
       $this->validate($request,
       [
           'GrammarLesson'=>'required',
           'TieuDe'=>'required|min:3|unique:GrammarLessonPage,TieuDe',
           'TomTat'=>'required',
           'NoiDung'=>'required'
       ],
       [
           'GrammarLesson.required'=>'Ban chua chon tên bài học',
           'TieuDe.required'=>'Ban chua nhap tieu de',
           'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
           'TieuDe.unique'=>'Tieu de da ton tai',
           'TomTat.required'=>'Ban chua nhap tom tat ',
           'NoiDung.required'=>'Ban chua nhap noi dung'
       ]);
       $grammarlessonpage = new GrammarLessonPage;
       $grammarlessonpage->TieuDe=$request->TieuDe;
       $grammarlessonpage->TieuDeKhongDau=changeTitle($request->TieuDe);
       $grammarlessonpage->idGrammarLesson=$request->GrammarLesson;
       $grammarlessonpage->TomTat=$request->TomTat;
       $grammarlessonpage->NoiDung=$request->NoiDung;
       $grammarlessonpage->idUser= Auth::user()->id;
       $grammarlessonpage->SoLuotXem=0;
       $grammarlessonpage->save();

       $user = Auth::user();
       $userpoint = UserPoint::where('idUser',$user->id)->first();
       $userpoint->GrammarPoint = $userpoint->GrammarPoint + 10;
       $userpoint->save();



       return redirect('admin/grammarlessonpage/them')->with('thongbao','Ban da them tin thanh cong');
    }
    public function getSua($id)
    {
        $grammar = Grammar::all();
        $grammarlesson = GrammarLesson::all();
        $grammarlessonpage = GrammarLessonPage::find($id);
        return view('admin.grammarlessonpage.sua',['grammarlessonpage'=>$grammarlessonpage,'grammar'=>$grammar,'grammarlesson'=>$grammarlesson]);
    }
    public function postSua(Request $request,$id )
    {
        $grammarlessonpage = GrammarLessonPage::find($id);
        $this->validate($request,
       [
           'GrammarLesson'=>'required',
           'TieuDe'=>'required|min:3|unique:GrammarLessonPage,TieuDe,'.$id,
           'TomTat'=>'required',
           'NoiDung'=>'required'
       ],
       [
           'GrammarLesson.required'=>'Ban chua chon tên bài học',
           'TieuDe.required'=>'Ban chua nhap tieu de',
           'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
           'TieuDe.unique'=>'Tieu de da ton tai',
           'TomTat.required'=>'Ban chua nhap tom tat ',
           'NoiDung.required'=>'Ban chua nhap noi dung'
       ]);
       $grammarlessonpage->TieuDe=$request->TieuDe;
       $grammarlessonpage->TieuDeKhongDau=changeTitle($request->TieuDe);
       $grammarlessonpage->idGrammarLesson=$request->GrammarLesson;
       $grammarlessonpage->TomTat=$request->TomTat;
       $grammarlessonpage->NoiDung=$request->NoiDung;
       $grammarlessonpage->save();

       return redirect('admin/grammarlessonpage/sua/'.$id)->with('thongbao','Ban da sua tin thanh cong');
    }
    public function getXoa($id)
    {
       $grammarlessonpage = GrammarLessonPage::find($id);
       $grammarexercisepage = GrammarExercisePage::where('idGrammarLessonPage',$id); //Tìm các bai tap của bai hoc
       
       $grammarexercisepage->delete(); //Xóa các bai tap của bai hoc
       $grammarlessonpage->delete(); //Xóa bai hoc

       return redirect ('admin/grammarlessonpage/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

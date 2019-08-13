<?php

namespace App\Http\Controllers\AdminGrammarController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Grammar;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\GrammarExercisePage;

class GrammarLessonController extends Controller
{
    //
    public function getDanhSach()
    {
        $grammarlesson = GrammarLesson::all();
        return view('admin.grammarlesson.danhsach',['grammarlesson'=>$grammarlesson]);
    }
    public function getThem()
    {
        $grammar = Grammar::all();
        return view('admin.grammarlesson.them',['grammar'=>$grammar]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required|unique:GrammarLesson,Ten|min:1|max:100',
            'Grammar'=>'required'
        ],
        [
            'Ten.required'=>'Ban chua nhap tên bài học',
            'Ten.unique'=>'Tên bài học da ton tai',
            'Ten.min'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Ten.max'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Grammar.required'=>'Ban chua chon chủ để grammar'
        ]);
        $grammarlesson = new GrammarLesson;
        $grammarlesson->Ten=$request->Ten;
        $grammarlesson->TenKhongDau=changeTitle($request->Ten);
        $grammarlesson->idGrammar=$request->Grammar;
        $grammarlesson->save();

        return redirect('admin/grammarlesson/them')->with('thongbao',
        'Ban da them thanh cong');
    }
    public function getSua($id)
    {
        $grammar = Grammar::all();
        $grammarlesson = GrammarLesson::find($id);
        return view('admin.grammarlesson.sua',['grammarlesson'=>$grammarlesson,'grammar'=>$grammar]);
    }
    public function postSua(Request $request,$id )
    {
        $this->validate($request,
        [
            'Ten'=>'required|min:1|max:100|unique:GrammarLesson,Ten,'.$id,
            'Grammar'=>'required'
        ],
        [
            'Ten.required'=>'Ban chua nhap tên bài học',
            'Ten.unique'=>'Tên bài học da ton tai',
            'Ten.min'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Ten.max'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Grammar.required'=>'Ban chua chon chủ để grammar'
        ]);
        $grammarlesson = GrammarLesson::find($id);
        $grammarlesson->Ten=$request->Ten;
        $grammarlesson->TenKhongDau=changeTitle($request->Ten);
        $grammarlesson->idGrammar=$request->Grammar;
        $grammarlesson->save();

        return redirect('admin/grammarlesson/sua/'.$id)->with('thongbao','Ban da sua thanh cong');
    }
    public function getXoa($id)
    {
        $grammarlesson = GrammarLesson::find($id);
        $grammarlessonpage = GrammarLessonPage::where('idGrammarLesson',$id); 
        $grammarlessonpage2 = GrammarLessonPage::where('idGrammarLesson',$id)->get();
        foreach($grammarlessonpage2 as $glp)
        {
            $grammarexercisepage = GrammarExercisePage::where('idGrammarLessonPage',$glp->id); 
            $grammarexercisepage->delete();
        }
        $grammarlessonpage->delete();
        $grammarlesson->delete();

        return redirect('admin/grammarlesson/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

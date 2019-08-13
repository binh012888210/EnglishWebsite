<?php

namespace App\Http\Controllers\AdminGrammarController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\GrammarExercisePage;
use App\Grammar;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\Comment;

class GrammarExercisePageController extends Controller
{
    //
    public function getDanhSach()
    {
        $grammarexercisepage = GrammarExercisePage::orderBy('id','DESC')->get();
        return view('admin.grammarexercisepage.danhsach',['grammarexercisepage'=>$grammarexercisepage]);
    }
    public function getThem()
    {
        $grammar = Grammar::all();
        $grammarlesson = GrammarLesson::all();
        $grammarlessonpage = GrammarLessonPage::all();
        return view('admin.grammarexercisepage.them',['grammar'=>$grammar,'grammarlesson'=>$grammarlesson,'grammarlessonpage'=>$grammarlessonpage]);    
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
           'GrammarLessonPage'=>'required'
        ],
        [
           'GrammarLessonPage.required'=>'Ban chua chon trang bài học'
        ]);
        foreach($request->question as $key => $v)
        {
            $data = array(
                'idGrammarLessonPage'=>$request->GrammarLessonPage,
                'Question'=>$v,
                'QuestionType'=>$request->questiontype [$key],
                'Answer'=>$request->answer [$key]
            );
            GrammarExercisePage::insert($data);
        }

       return redirect('admin/grammarexercisepage/them')->with('thongbao','Ban da them bai tap ngu phap thanh cong');
    }
    public function getSua($id)
    {
        $grammarexercisepage = GrammarExercisePage::find($id);
        return view('admin.grammarexercisepage.sua',['grammarexercisepage'=>$grammarexercisepage]);
    }
    public function postSua(Request $request,$id )
    {
        $grammarexercisepage = GrammarExercisePage::find($id);
        $grammarexercisepage->QuestionType=$request->questiontype;
        $grammarexercisepage->Question=$request->question;
        $grammarexercisepage->Answer=$request->answer;
        $grammarexercisepage->save();

       return redirect('admin/grammarexercisepage/sua/'.$id)->with('thongbao','Ban da sua bai tap ngu phap thanh cong');
    }
    public function getXoa($id)
    {
       $grammarexercisepage = GrammarExercisePage::find($id);
       $grammarexercisepage->delete();

       return redirect ('admin/grammarexercisepage/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

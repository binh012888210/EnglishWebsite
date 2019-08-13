<?php

namespace App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Skill;
use App\SkillLesson;
use App\SkillLessonPage;
use App\SkillExercisePage;
use App\Comment;

class SkillExercisePageController extends Controller
{
    //
    public function getDanhSach()
    {
        $skillexercisepage = SkillExercisePage::orderBy('id','DESC')->get();
        return view('admin.skillexercisepage.danhsach',['skillexercisepage'=>$skillexercisepage]);
    }
    public function getThem()
    {
        $skill = Skill::all();
        $skilllesson = SkillLesson::all();
        $skilllessonpage = SkillLessonPage::all();
        return view('admin.skillexercisepage.them',['skill'=>$skill,'skilllesson'=>$skilllesson,'skilllessonpage'=>$skilllessonpage]);    
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
           'SkillLessonPage'=>'required'
        ],
        [
           'SkillLessonPage.required'=>'Ban chua chon trang bài học'
        ]);
        foreach($request->question as $key => $v)
        {
            $data = array(
                'idSkillLessonPage'=>$request->SkillLessonPage,
                'Question'=>$v,
                'QuestionType'=>$request->questiontype [$key],
                'Answer'=>$request->answer [$key]
            );
            SkillExercisePage::insert($data);
        }

       return redirect('admin/skillexercisepage/them')->with('thongbao','Ban da them bai tap ky nang thanh cong');
    }
    public function getSua($id)
    {
        $skillexercisepage = SkillExercisePage::find($id);
        return view('admin.skillexercisepage.sua',['skillexercisepage'=>$skillexercisepage]);
    }
    public function postSua(Request $request,$id )
    {
        $skillexercisepage = SkillExercisePage::find($id);
        $skillexercisepage->QuestionType=$request->questiontype;
        $skillexercisepage->Question=$request->question;
        $skillexercisepage->Answer=$request->answer;
        $skillexercisepage->save();

       return redirect('admin/skillexercisepage/sua/'.$id)->with('thongbao','Ban da sua bai tap ky nang thanh cong');
    }
    public function getXoa($id)
    {
       $skillexercisepage = SkillExercisePage::find($id);
       $skillexercisepage->delete();

       return redirect ('admin/skillexercisepage/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

<?php

namespace App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Skill;
use App\SkillLesson;
use App\SkillLessonPage;
use App\SkillExercisePage;

class SkillLessonController extends Controller
{
    //
    public function getDanhSach()
    {
        $skilllesson = SkillLesson::all();
        return view('admin.skilllesson.danhsach',['skilllesson'=>$skilllesson]);
    }
    public function getThem()
    {
        $skill = Skill::all();
        return view('admin.skilllesson.them',['skill'=>$skill]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required|unique:SkillLesson,Ten|min:1|max:100',
            'Skill'=>'required'
        ],
        [
            'Ten.required'=>'Ban chua nhap tên bài học',
            'Ten.unique'=>'Tên bài học da ton tai',
            'Ten.min'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Ten.max'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Skill.required'=>'Ban chua chon chủ để grammar'
        ]);
        $skilllesson = new SkillLesson;
        $skilllesson->Ten=$request->Ten;
        $skilllesson->TenKhongDau=changeTitle($request->Ten);
        $skilllesson->idSkill=$request->Skill;
        $skilllesson->save();

        return redirect('admin/skilllesson/them')->with('thongbao',
        'Ban da them thanh cong');
    }
    public function getSua($id)
    {
        $skill = Skill::all();
        $skilllesson = SkillLesson::find($id);
        return view('admin.skilllesson.sua',['skilllesson'=>$skilllesson,'skill'=>$skill]);
    }
    public function postSua(Request $request,$id )
    {
        $this->validate($request,
        [
            'Ten'=>'required|min:1|max:100|unique:SkillLesson,Ten,'.$id,
            'Skill'=>'required'
        ],
        [
            'Ten.required'=>'Ban chua nhap tên bài học',
            'Ten.unique'=>'Tên bài học da ton tai',
            'Ten.min'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Ten.max'=>'Tên bài học phai co do dai tu 1 den 100 ky tu',
            'Skill.required'=>'Ban chua chon chủ để grammar'
        ]);
        $skilllesson = SkillLesson::find($id);
        $skilllesson->Ten=$request->Ten;
        $skilllesson->TenKhongDau=changeTitle($request->Ten);
        $skilllesson->idSkill=$request->Skill;
        $skilllesson->save();

        return redirect('admin/skilllesson/sua/'.$id)->with('thongbao','Ban da sua thanh cong');
    }
    public function getXoa($id)
    {
        $skilllesson = SkillLesson::find($id);
        $skilllessonpage = SkillLessonPage::where('idSkillLesson',$id); 
        $skilllessonpage2 = SkillLessonPage::where('idSkillLesson',$id)->get();
        foreach($skilllessonpage2 as $slp)
        {
            $skillexercisepage = SkillExercisePage::where('idSkillLessonPage',$slp->id); 
            $skillexercisepage->delete();
        }
        $skilllessonpage->delete();
        $skilllesson->delete();

       return redirect('admin/skilllesson/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

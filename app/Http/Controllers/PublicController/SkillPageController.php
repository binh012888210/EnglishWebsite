<?php

namespace App\Http\Controllers\PublicController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Dang nhap

use App\Skill;
use App\SkillLesson;
use App\SkillLessonPage;
use App\SkillExercisePage;
use App\Comment;

class SkillPageController extends Controller
{
    function __construct()
    {
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }

    function mainpage ()
    {
        return view('skillPages.skillMainPage');
    }

    function subpage($id)
    {
        $skilllesson = SkillLesson::find($id);
        $skilllessonpage = SkillLessonPage::where('idSkillLesson',$id)->paginate(5);
        return view('skillPages.skillSubPage',['skilllesson'=>$skilllesson,'skilllessonpage'=>$skilllessonpage]);
    }
    function page($id)
    {
        $skilllessonpage = SkillLessonPage::find($id);
        $skillexercisepage = SkillExercisePage::where('idSkillLessonPage',$id)->get();
        // $this->addViewCount($id);
        return view('skillPages.skillLessonPage',['skillexercisepage'=>$skillexercisepage,'skilllessonpage'=>$skilllessonpage]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\SkillLesson;
use App\SkillLessonPage;
use App\DiaryEnglish;

use App\UserPoint;
use Illuminate\Support\Facades\Auth;//Dang nhap

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai)
    {
        $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as $lt)
        {
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }

    }
    public function getGrammarLesson($idGrammar)
    {
        $grammarlesson = GrammarLesson::where('idGrammar',$idGrammar)->get();
        foreach($grammarlesson as $gl)
        {
            echo "<option value='".$gl->id."'>".$gl->Ten."</option>";
        }
    }
    public function getGrammarLessonPage($idGrammarLesson)
    {
        $grammarlessonpage = GrammarLessonPage::where('idGrammarLesson',$idGrammarLesson)->get();
        foreach($grammarlessonpage as $glp)
        {
            echo "<option value='".$glp->id."'>".$glp->TieuDe."</option>";
        }
    }
    public function getSkillLesson($idSkill)
    {
        $skilllesson = SkillLesson::where('idSkill',$idSkill)->get();
        foreach($skilllesson as $sl)
        {
            echo "<option value='".$sl->id."'>".$sl->Ten."</option>";
        }
    }
    public function getSkillLessonPage($idSkillLesson)
    {
        $skilllessonpage = SkillLessonPage::where('idSkillLesson',$idSkillLesson)->get();
        foreach($skilllessonpage as $slp)
        {
            echo "<option value='".$slp->id."'>".$slp->TieuDe."</option>";
        }
    }
    public function getAddOrMinusPoint($idExercise,$point)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $userpoint = UserPoint::where('idUser',$user->id)->first();

            if($idExercise==1&&$userpoint->GrammarPoint>=0)
                $userpoint->GrammarPoint = $userpoint->GrammarPoint + $point;
            if($idExercise==2&&$userpoint->SkillPoint>=0)
                $userpoint->SkillPoint = $userpoint->SkillPoint + $point;
            $userpoint->save();
        }
    }
    public function getAddLikeNumber($id)
    {
        $diaryenglish = DiaryEnglish::find($id);
        $diaryenglish->LikeNumber++;
        $diaryenglish->save();
    }
    public function getAddReportNumber($id)
    {
        $diaryenglish = DiaryEnglish::find($id);
        $diaryenglish->ReportNumber++;
        $diaryenglish->save();
    }
}

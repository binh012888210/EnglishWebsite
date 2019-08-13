<?php

namespace App\Http\Controllers\PublicController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\DiaryEnglish;
use Illuminate\Support\Facades\Auth;//Dang nhap

class DiaryController extends Controller
{
    //
    function getXoaDiary($id)
    {
       $diaryenglish = DiaryEnglish::find($id);
       $diaryenglish->delete();

       return redirect('diary');
    }

    function postThemDiary(Request $request)
    {
        $diaryenglish = new DiaryEnglish;
        $diaryenglish->idUser = Auth::user()->id;
        $diaryenglish->NoiDung = $request->NoiDung;
        $diaryenglish->Tag = $request->Tag;
        $diaryenglish->LikeNumber = '0';
        $diaryenglish->ReportNumber = '0';
        $diaryenglish->save();

        return redirect('diary');
    }
    function page()
    {
        $diaryenglish = DiaryEnglish::orderBy('id','DESC')->get();
        return view('diaryPages.diaryPage',['diaryenglish'=>$diaryenglish]);
    }
    function pageYourDiary()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $diaryenglish = DiaryEnglish::where('idUser',$user->id)->get();
            return view('diaryPages.diaryPage',['diaryenglish'=>$diaryenglish]);
        }
        else
        {
            return redirect('diary');
        }
    }
    function pageWithFilter($filter)
    {
        if($filter=='old')
        {
            $diaryenglish = DiaryEnglish::orderBy('id','ASC')->get();
        }
        else if($filter=='popular')
        {
            $diaryenglish = DiaryEnglish::orderBy('LikeNumber','DESC')->get();
        }
        else if($filter=='report')
        {
            $diaryenglish = DiaryEnglish::orderBy('ReportNumber','DESC')->get();
        }
        else if($filter=='hocduong'||$filter=='xahoi'||$filter=='congnghe')
        {
            $diaryenglish = DiaryEnglish::where('Tag',$filter)->get();
        }
        return view('diaryPages.diaryPage',['diaryenglish'=>$diaryenglish]);
    }
    
}

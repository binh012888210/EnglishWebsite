<?php

namespace App\Http\Controllers\PublicController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Dang nhap

use App\Grammar;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\GrammarExercisePage;
use App\Comment;

class GrammarPageController extends Controller
{
    //
    function __construct()
    {
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }

    function mainpage ()
    {
        return view('grammarPages.grammarMainPage');
    }

    function subpage($id)
    {
        $grammarlesson = GrammarLesson::find($id);
        $grammarlessonpage = GrammarLessonPage::where('idGrammarLesson',$id)->paginate(5);
        return view('grammarPages.grammarSubPage',['grammarlesson'=>$grammarlesson,'grammarlessonpage'=>$grammarlessonpage]);
    }
    function page($id)
    {
        $grammarlessonpage = GrammarLessonPage::find($id);
        // $this->addViewCount($id);
        return view('grammarPages.grammarLessonPage',['grammarlessonpage'=>$grammarlessonpage]);
    }
    function exercisepage($id)
    {
        $grammarlessonpage = GrammarLessonPage::find($id);
        $grammarexercisepage = GrammarExercisePage::where('idGrammarLessonPage',$id)->get();
        // $this->addViewCount($id);
        return view('grammarPages.grammarExercisePage',['grammarexercisepage'=>$grammarexercisepage],['grammarlessonpage'=>$grammarlessonpage]);
    }
}

<?php

namespace App\Http\Controllers\AdminGrammarController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Grammar;
use App\GrammarLesson;
use App\GrammarLessonPage;
use App\GrammarExercisePage;


class GrammarController extends Controller
{
    //
    public function getDanhSach()
    {
        $grammar = Grammar::all();
        return view('admin.grammar.danhsach',['grammar'=>$grammar]);
    }
    public function getThem()
    {
        return view('admin.grammar.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [ 
                'Ten.required'=>'Ban chua nhap chủ để grammar',
                'Ten.uique' => 'Chủ để grammar the loai da ton tai',
                'Ten.min'=>'Chủ để grammar phai co do dai tu 3 den 100 ky tu',
                'Ten.max'=>'Chủ để grammar phai co do dai tu 3 den 100 ky tu',
            ]);
            $grammar = new Grammar;
            $grammar->Ten=$request->Ten;
            $grammar->TenKhongDau=changeTitle($request->Ten);
            $grammar->save();

            return redirect('admin/grammar/them')->with('thongbao',
            'Them thanh cong');

    }
    public function getSua($id)
    {
        $grammar = Grammar::find($id);
        return view('admin.grammar.sua',['grammar'=>$grammar]); 
    }
    public function postSua(Request $request,$id )
    {
        $grammar = Grammar::find($id);
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
        ],
        [ 
            'Ten.required'=>'Ban chua nhap chủ để grammar',
            'Ten.uique' => 'Chủ để grammar the loai da ton tai'.$id,
            'Ten.min'=>'Chủ để grammar phai co do dai tu 3 den 100 ky tu',
            'Ten.max'=>'Chủ để grammar phai co do dai tu 3 den 100 ky tu',
        ]);
        $grammar->Ten=$request->Ten;
        $grammar->TenKhongDau=changeTitle($request->Ten);
        $grammar->save();

        return redirect('admin/grammar/them')->with('thongbao',
        'Sua thanh cong');
    }
    public function getXoa($id)
    {
        $grammar= Grammar::find($id);
        $grammarlesson = GrammarLesson::where('idGrammar',$id); 
        $grammarlesson2 = GrammarLesson::where('idGrammar',$id)->get(); 
        foreach($grammarlesson2 as $gl)
        {
            $grammarlessonpage = GrammarLessonPage::where('idGrammarLesson',$gl->id); 
            $grammarlessonpage2 = GrammarLessonPage::where('idGrammarLesson',$gl->id)->get();
            foreach($grammarlessonpage2 as $glp)
            {
                $grammarexercisepage = GrammarExercisePage::where('idGrammarLessonPage',$glp->id); 
                $grammarexercisepage->delete();
            }
            $grammarlessonpage->delete();
        }
        $grammarlesson->delete(); //Xóa các loai tin của theloai
        $grammar->delete();

        return redirect('admin/grammar/danhsach')->with('thongbao',
        'Ban da xoa thanh cong');
    }
}

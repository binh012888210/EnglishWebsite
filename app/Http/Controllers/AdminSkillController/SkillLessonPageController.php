<?php

namespace App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;//Dang nhap
use Illuminate\Http\Request;

use App\Skill;
use App\SkillLesson;
use App\SkillLessonPage;
use App\SkillExercisePage;
use App\UserPoint;
use App\Comment;

class SkillLessonPageController extends Controller
{
    public function getDanhSach()
    {
        $skilllessonpage = SkillLessonPage::orderBy('id','DESC')->get();
        return view('admin.skilllessonpage.danhsach',['skilllessonpage'=>$skilllessonpage]);
    }
    public function getThem()
    {
        $skill = Skill::all();
        $skilllesson = SkillLesson::all();
        return view('admin.skilllessonpage.them',['skill'=>$skill],['skilllesson'=>$skilllesson]);    
    }
    public function postThem(Request $request)
    {
       $this->validate($request,
       [
           'SkillLesson'=>'required',
           'TieuDe'=>'required|min:3|unique:SkillLessonPage,TieuDe',
           'TomTat'=>'required',
           'NoiDung'=>'required',
           'Hinh' => 'image|mimes:jpg,png,jpeg|max:2000',
           'Video' => 'mimes:mp4,mov,ogg|max:20000',
           'Audio' => 'mimes:mpga|max:20000'
       ],
       [
           'SkillLesson.required'=>'Ban chua chon tên bài học',
           'TieuDe.required'=>'Ban chua nhap tieu de',
           'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
           'TieuDe.unique'=>'Tieu de da ton tai',
           'TomTat.required'=>'Ban chua nhap tom tat ',
           'NoiDung.required'=>'Ban chua nhap noi dung',
           'Hinh.image'=>'Ban chi duoc chon file hinh',
           'Hinh.mimes'=>'File hinh co dinh dang jpeg, png',
           'Hinh.max'=>'File hinh co dung luong khong lon qua 2MB',
           'Video.mimes'=>'File video co dinh dang mp4, mov',
           'Video.max'=>'File video co dung luong khong lon qua 20MB',
       ]);
       $skilllessonpage = new SkillLessonPage;
       $skilllessonpage->TieuDe=$request->TieuDe;
       $skilllessonpage->TieuDeKhongDau=changeTitle($request->TieuDe);
       $skilllessonpage->idSkillLesson=$request->SkillLesson;
       $skilllessonpage->TomTat=$request->TomTat;
       $skilllessonpage->NoiDung=$request->NoiDung;
       $skilllessonpage->VideoOnline=$request->VideoOnline;
       $skilllessonpage->Audio=$request->Audio;
       $skilllessonpage->idUser= Auth::user()->id;
       $skilllessonpage->SoLuotXem=0;
       
       if($request->hasFile('Video'))
       {
            $file=$request->File('Video');
            $name=$file->getClientOriginalName();
            $Video=str_random(4)."_".$name;
            while(file_exists("upload/skilllesson/video/".$Video))
            {
                $Video=str_random(4)."_".$name;
            }
            $file->move("upload/skilllesson/video",$Video);
            $skilllessonpage->Video=$Video;
       }
       else
       {
           $skilllessonpage->Video= "";
       }

       if($request->hasFile('Hinh'))
       {
            $file=$request->File('Hinh');
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while(file_exists("upload/skilllesson/hinh/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/skilllesson/hinh/",$Hinh);
            $skilllessonpage->Hinh=$Hinh;
       }
       else
       {
           $skilllessonpage->Hinh= "";
       }
       if($request->hasFile('Audio'))
       {
            $file=$request->File('Audio');
            $name=$file->getClientOriginalName();
            $Audio=str_random(4)."_".$name;
            while(file_exists("upload/skilllesson/audio/".$Audio))
            {
                $Audio=str_random(4)."_".$name;
            }
            $file->move("upload/skilllesson/audio/",$Audio);
            $skilllessonpage->Audio=$Audio;
       }
       else
       {
           $skilllessonpage->Audio= "";
       }
       $skilllessonpage->save();

       $user = Auth::user();
       $userpoint = UserPoint::where('idUser',$user->id)->first();
       $userpoint->SkillPoint = $userpoint->SkillPoint + 10;
       $userpoint->save();

       return redirect('admin/skilllessonpage/them')->with('thongbao','Ban da them tin thanh cong');
    }
    public function getSua($id)
    {
        $skill = Skill::all();
        $skilllesson = SkillLesson::all();
        $skilllessonpage = SkillLessonPage::find($id);
        return view('admin.skilllessonpage.sua',['skilllessonpage'=>$skilllessonpage,'skill'=>$skill,'skilllesson'=>$skilllesson]);
    }
    public function postSua(Request $request,$id )
    {
        $skilllessonpage = SkillLessonPage::find($id);
        if($request->DeleteMediaData=='Deleted')
        {
            if(!empty($skilllessonpage->Hinh))
            {   
                unlink("upload/skilllesson/hinh/".$skilllessonpage->Hinh);
                $skilllessonpage->Hinh= "";
            }
            if(!empty($skilllessonpage->Video))
            {
                unlink("upload/skilllesson/video/".$skilllessonpage->Video);
                $skilllessonpage->Video= "";
            }
            if(!empty($skilllessonpage->Audio))
            {
                unlink("upload/skilllesson/audio/".$skilllessonpage->Audio);
                $skilllessonpage->Audio= "";
            }
            $skilllessonpage->VideoOnline= "";
            $skilllessonpage->save();
            return redirect('admin/skilllessonpage/sua/'.$id)->with('thongbao','Ban da xoa toan bo du lieu media');
        }
        $this->validate($request,
        [
            'SkillLesson'=>'required',
            'TieuDe'=>'required|min:3|unique:SkillLessonPage,TieuDe,'.$id,
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh' => 'image|mimes:jpg,png,jpeg|max:2000',
            'Video' => 'mimes:mp4,mov,ogg|max:20000',
            'Audio' => 'mimes:mpga|max:20000'
        ],
        [
            'SkillLesson.required'=>'Ban chua chon tên bài học',
            'TieuDe.required'=>'Ban chua nhap tieu de',
            'TieuDe.min'=>'Tieu de phai co it nhat 3 ky tu',
            'TieuDe.unique'=>'Tieu de da ton tai',
            'TomTat.required'=>'Ban chua nhap tom tat ',
            'NoiDung.required'=>'Ban chua nhap noi dung',
            'Hinh.image'=>'Ban chi duoc chon file hinh',
            'Hinh.mimes'=>'File hinh co dinh dang jpeg, png',
            'Hinh.max'=>'File hinh co dung luong khong lon qua 2MB',
            'Video.mimes'=>'File video co dinh dang mp4, mov',
            'Video.max'=>'File video co dung luong khong lon qua 20MB',
        ]);
        $skilllessonpage->TieuDe=$request->TieuDe;
        $skilllessonpage->TieuDeKhongDau=changeTitle($request->TieuDe);
        $skilllessonpage->idSkillLesson=$request->SkillLesson;
        $skilllessonpage->TomTat=$request->TomTat;
        $skilllessonpage->NoiDung=$request->NoiDung;
        $skilllessonpage->VideoOnline=$request->VideoOnline;
        $skilllessonpage->idUser= Auth::user()->id;
        $skilllessonpage->SoLuotXem=0;
        
        if($request->hasFile('Video'))
        {
             $file=$request->File('Video');
             $name=$file->getClientOriginalName();
             $Video=str_random(4)."_".$name;
             while(file_exists("upload/skilllesson/video/".$Video))
             {
                 $Video=str_random(4)."_".$name;
             }
             $file->move("upload/skilllesson/video",$Video);
             $skilllessonpage->Video=$Video;
        }
 
        if($request->hasFile('Hinh'))
        {
             $file=$request->File('Hinh');
             $name=$file->getClientOriginalName();
             $Hinh=str_random(4)."_".$name;
             while(file_exists("upload/skilllesson/hinh/".$Hinh))
             {
                 $Hinh=str_random(4)."_".$name;
             }
             $file->move("upload/skilllesson/hinh/",$Hinh);
             $skilllessonpage->Hinh=$Hinh;
        }

        if($request->hasFile('Audio'))
        {
            $file=$request->File('Audio');
            $name=$file->getClientOriginalName();
            $Audio=str_random(4)."_".$name;
            while(file_exists("upload/skilllesson/audio/".$Audio))
            {
                $Audio=str_random(4)."_".$name;
            }
            $file->move("upload/skilllesson/audio/",$Audio);
            $skilllessonpage->Audio=$Audio;
        }
        $skilllessonpage->save();

        return redirect('admin/skilllessonpage/sua/'.$id)->with('thongbao','Ban da sua tin thanh cong');
    }
    public function getXoa($id)
    {
        $skilllessonpage = SkillLessonPage::find($id);
        $skillexercisepage = SkillExercisePage::where('idSkillLessonPage',$id); 
        $skillexercisepage->delete();
        $skilllessonpage->delete();

       return redirect ('admin/skilllessonpage/danhsach')->with('thongbao','Xoa thanh cong');
    }
}

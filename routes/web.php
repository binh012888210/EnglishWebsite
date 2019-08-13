<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;

Route::get('/', function () {
    return view('homepage');
});

//Router section for admin - teacher
Route::get('admin/dangnhap','AdminUserController\UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','AdminUserController\UserController@postDangnhapAdmin');
Route::get('admin/logout','Auth\LoginController@logout');//Xài chung hàm đăng xuất với học sinh

Route::group(['prefix'=>'admin','middleware'=>'teacherLogin'],function(){
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','AdminNewsController\TheLoaiController@getDanhSach');   
       
        Route::get('sua/{id}','AdminNewsController\TheLoaiController@getSua');  
        Route::post('sua/{id}','AdminNewsController\TheLoaiController@postSua');  
       
        Route::get('them','AdminNewsController\TheLoaiController@getThem');
        Route::post('them','AdminNewsController\TheLoaiController@postThem');
        
        Route::get('xoa/{id}','AdminNewsController\TheLoaiController@getXoa');
    });
    Route::group(['prefix'=>'loaitin'],function(){
        Route::get('danhsach','AdminNewsController\LoaiTinController@getDanhSach');   
       
        Route::get('sua/{id}','AdminNewsController\LoaiTinController@getSua');  
        Route::post('sua/{id}','AdminNewsController\LoaiTinController@postSua');  
       
        Route::get('them','AdminNewsController\LoaiTinController@getThem');
        Route::post('them','AdminNewsController\LoaiTinController@postThem');
        
        Route::get('xoa/{id}','AdminNewsController\LoaiTinController@getXoa');
    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','AdminNewsController\TinTucController@getDanhSach');

        Route::get('sua/{id}','AdminNewsController\TinTucController@getSua');
        Route::post('sua/{id}','AdminNewsController\TinTucController@postSua');

        Route::get('them','AdminNewsController\TinTucController@getThem');
        Route::post('them','AdminNewsController\TinTucController@postThem');

        Route::get('xoa/{id}','AdminNewsController\TinTucController@getXoa');
        Route::get('xoacomment/{id}/{idTinTuc}','AdminNewsController\TinTucController@getXoaComment');
    });
    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
        Route::get('grammarlesson/{idGrammar}','AjaxController@getGrammarLesson');
        Route::get('grammarlessonpage/{idGrammarLesson}','AjaxController@getGrammarLessonPage');
        Route::get('skilllesson/{idSkill}','AjaxController@getSkillLesson');
        Route::get('skilllessonpage/{idSkillLesson}','AjaxController@getSkillLessonPage');
    });
    //Section manage user (only admin can)
    Route::group(['prefix'=>'user','middleware'=>'adminLogin'],function(){
        Route::get('danhsach','AdminUserController\UserController@getDanhSach');

        Route::get('sua/{id}','AdminUserController\UserController@getSua');
        Route::post('sua/{id}','AdminUserController\UserController@postSua');

        Route::get('them','AdminUserController\UserController@getThem');
        Route::post('them','AdminUserController\UserController@postThem');

        Route::get('xoa/{id}','AdminUserController\UserController@getXoa');
    });
    //Section grammar - lesson 
    Route::group(['prefix'=>'grammar'],function(){
        Route::get('danhsach','AdminGrammarController\GrammarController@getDanhSach');

        Route::get('sua/{id}','AdminGrammarController\GrammarController@getSua');
        Route::post('sua/{id}','AdminGrammarController\GrammarController@postSua');

        Route::get('them','AdminGrammarController\GrammarController@getThem');
        Route::post('them','AdminGrammarController\GrammarController@postThem');

        Route::get('xoa/{id}','AdminGrammarController\GrammarController@getXoa');
    });
    Route::group(['prefix'=>'grammarlesson'],function(){
        Route::get('danhsach','AdminGrammarController\GrammarLessonController@getDanhSach');   
       
        Route::get('sua/{id}','AdminGrammarController\GrammarLessonController@getSua');  
        Route::post('sua/{id}','AdminGrammarController\GrammarLessonController@postSua');  
       
        Route::get('them','AdminGrammarController\GrammarLessonController@getThem');
        Route::post('them','AdminGrammarController\GrammarLessonController@postThem');
        
        Route::get('xoa/{id}','AdminGrammarController\GrammarLessonController@getXoa');
    });
    Route::group(['prefix'=>'grammarlessonpage'],function(){
        Route::get('danhsach','AdminGrammarController\GrammarLessonPageController@getDanhSach');   
       
        Route::get('sua/{id}','AdminGrammarController\GrammarLessonPageController@getSua');  
        Route::post('sua/{id}','AdminGrammarController\GrammarLessonPageController@postSua');  
       
        Route::get('them','AdminGrammarController\GrammarLessonPageController@getThem');
        Route::post('them','AdminGrammarController\GrammarLessonPageController@postThem');
        
        Route::get('xoa/{id}','AdminGrammarController\GrammarLessonPageController@getXoa');
    });
    //Section grammar - exercise 
    Route::group(['prefix'=>'grammarexercisepage'],function(){
        Route::get('danhsach','AdminGrammarController\GrammarExercisePageController@getDanhSach');   
       
        Route::get('sua/{id}','AdminGrammarController\GrammarExercisePageController@getSua');  
        Route::post('sua/{id}','AdminGrammarController\GrammarExercisePageController@postSua');  
       
        Route::get('them','AdminGrammarController\GrammarExercisePageController@getThem');
        Route::post('them','AdminGrammarController\GrammarExercisePageController@postThem');
        
        Route::get('xoa/{id}','AdminGrammarController\GrammarExercisePageController@getXoa');
    });
    //Section skill - lesson
    Route::group(['prefix'=>'skill'],function(){
        Route::get('danhsach','AdminSkillController\SkillController@getDanhSach');
    });
    Route::group(['prefix'=>'skilllesson'],function(){
        Route::get('danhsach','AdminSkillController\SkillLessonController@getDanhSach');

        Route::get('sua/{id}','AdminSkillController\SkillLessonController@getSua');
        Route::post('sua/{id}','AdminSkillController\SkillLessonController@postSua');

        Route::get('them','AdminSkillController\SkillLessonController@getThem');
        Route::post('them','AdminSkillController\SkillLessonController@postThem');

        Route::get('xoa/{id}','AdminSkillController\SkillLessonController@getXoa');
    });
    Route::group(['prefix'=>'skilllessonpage'],function(){
        Route::get('danhsach','AdminSkillController\SkillLessonPageController@getDanhSach');   
       
        Route::get('sua/{id}','AdminSkillController\SkillLessonPageController@getSua');  
        Route::post('sua/{id}','AdminSkillController\SkillLessonPageController@postSua');  
       
        Route::get('them','AdminSkillController\SkillLessonPageController@getThem');
        Route::post('them','AdminSkillController\SkillLessonPageController@postThem');
        
        Route::get('xoa/{id}','AdminSkillController\SkillLessonPageController@getXoa');
    });
    //Section skill - exercise 
    Route::group(['prefix'=>'skillexercisepage'],function(){
        Route::get('danhsach','AdminSkillController\SkillExercisePageController@getDanhSach');   
       
        Route::get('sua/{id}','AdminSkillController\SkillExercisePageController@getSua');  
        Route::post('sua/{id}','AdminSkillController\SkillExercisePageController@postSua');  
       
        Route::get('them','AdminSkillController\SkillExercisePageController@getThem');
        Route::post('them','AdminSkillController\SkillExercisePageController@postThem');
        
        Route::get('xoa/{id}','AdminSkillController\SkillExercisePageController@getXoa');
    });
});

//Login section for student
Route::get('dangnhap','Auth\LoginController@showLoginForm');
Route::post('dangnhap','Auth\LoginController@login');
Route::get('dangxuat','Auth\LoginController@logout');
Route::get('dangky','Auth\RegisterController@showRegistrationForm');
Route::post('dangky','Auth\RegisterController@register');

Route::get('nguoidung','PublicController\UserPagesController@getNguoiDung');
Route::post('nguoidung','PublicController\UserPagesController@postNguoidung');


//Section reading news
Route::get('readingnews','PublicController\NewsPagesController@trangchu');
Route::get('lienhe','PublicController\NewsPagesController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html','PublicController\NewsPagesController@loaitin');
Route::get('theloai/{id}','PublicController\NewsPagesController@getallloaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PublicController\NewsPagesController@tintuc');

Route::post('comment/{id}','PublicController\CommentController@postComment');

//Section lesson pages
Route::get('ajax/addorminuspoint/{idExercise}/{point}','AjaxController@getAddOrMinusPoint');

//Section grammar
Route::get('grammarmainpage','PublicController\GrammarPageController@mainpage');
Route::get('grammarsubpage/{id}','PublicController\GrammarPageController@subpage');
Route::get('grammarpage/{id}/{TieuDeKhongDau}.html','PublicController\GrammarPageController@page');
Route::get('grammarexercisepage/{id}/{TieuDeKhongDau}.html','PublicController\GrammarPageController@exercisepage');

//Section skill
Route::get('skillmainpage','PublicController\SkillPageController@mainpage');
Route::get('skillsubpage/{id}','PublicController\SkillPageController@subpage');
Route::get('skillpage/{id}/{TieuDeKhongDau}.html','PublicController\SkillPageController@page');

//Section diary
Route::get('diary','PublicController\DiaryController@page');
Route::get('diary/filter/{filter}','PublicController\DiaryController@pageWithFilter');
Route::get('diary/yourdiary','PublicController\DiaryController@pageYourDiary');
Route::get('xoadiary/{id}','PublicController\DiaryController@getXoaDiary');
Route::post('diary/them','PublicController\DiaryController@postThemDiary');
Route::get('ajax/addlikenumber/{id}','AjaxController@getAddLikeNumber');
Route::get('ajax/addreportnumber/{id}','AjaxController@getAddReportNumber');

Route::get('trangchu',function(){
    return view('homepage');
});
Route::get('/', function () {
    return view('homepage');
});
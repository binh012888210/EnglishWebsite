<?php

namespace App\Http\Controllers\PublicController;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;//Dang nhap

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserPagesController extends Controller
{
    function __construct()
    {
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }


    // Sử dụng hàm đăng nhập và đăng xuất  do laravel cung cấp search AuthenticatesUsers.php
    // function getDangnhap()
    // {
    //     return view('userPages.dangnhap');
    // }
    // function postDangnhap(Request $request)
    // {
    //     $this->validate($request,[
    //         'email'=>'required',
    //         'password'=>'required|min:3|max:32'
    //     ],[
    //         'email.required'=>'Ban chua nhap email',
    //         'password.required'=>'Banh chua nhap Password',
    //         'password.min'=>'password nho hon 3 ky tu',
    //         'password.max'=>'password khong duoc lon hon 32 ky tu'
    //     ]);
    //     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    //     {
    //         return redirect('trangchu');
    //     }
    //     else
    //     {
    //         return redirect('dangnhap')->with('thongbao','Dang nhap khong thanh cong');
    //     }
    // }
    //
    // function getDangxuat()
    // {
    //     Auth::logout();
    //     return redirect('trangchu');
    // }

    public function getNguoiDung(){
        if(Auth::check())
         return view('userPages.nguoidung');
        else
         return redirect('dangnhap')->with('message','Bạn chưa Đăng Nhập!');
       }
    function postnguoidung(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Phai co 3 ky tu',
        ]);
        $user = Auth::user();
        $user->name= $request->name;


        // if($request->changePassword == "on") trungquandev.com giai thich la khong sua dc mat khau
        if(isset($request->changePassword))
        {
            $this->validate($request,[
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ],[
                'password.required' => 'Ban chua nhapmat khau',
                'password.min' => 'Mat khau phai co it nhat 3 ky tu',
                'password.max' => 'Mat khau phai co nhieu nhat 32 ky tu',
                'passwordAgain.required'=> 'Ban chua nhap lai mat khau',
                'passwordAgain.same' => 'Mat khau nhap lai chua khop'
    
            ]);
            $user->password= bcrypt($request->password);
        }
       
        $user->save();
        return redirect('nguoidung')->with('thongbao','ban da sua thanh cong');
    }

    // Sử dụng hàm đăng ký do laravel cung cấp search RegistersUsers.php
    // function getDangky()
    // {
    //     return view('userPages.dangky');
    // }
    // function postDangky(Request $request)
    // {
    //     $this->validate($request,[
    //         'name' => 'required|min:3',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:3|max:32',
    //         'passwordAgain' => 'required|same:password'
    //     ],[
    //         'name.required' => 'Bạn chưa nhập tên người dùng',
    //         'name.min' => 'Phai co 3 ky tu',

    //         'email.required' => 'Ban chua nhap email',
    //         'email.email' => 'Ban chua nhap dung dinh danh email',
    //         'email.unique' => 'Email da ton tai',
    //         'password.required' => 'Ban chua nhapmat khau',
    //         'password.min' => 'Mat khau phai co it nhat 3 ky tu',
    //         'password.max' => 'Mat khau phai co nhieu nhat 32 ky tu',
    //         'passwordAgain.required'=> 'Ban chua nhap lai mat khau',
    //         'passwordAgain.same' => 'Mat khau nhap lai chua khop'

    //     ]);
    //     $user = new User;
    //     $user->name= $request->name;
    //     $user->email= $request->email;
    //     $user->password= bcrypt($request->password);
    //     $user->quyen= 0;
    //     $user->save();

    //     return redirect('dangky')->with('thongbao','Chuc mung ban da dangky thanh cong');
    // }
}

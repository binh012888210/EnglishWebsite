<?php

namespace App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;//Dang nhap
use App\User;
use App\Comment;
use App\DiaryEnglish;
use App\UserPoint;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
        $user = User::all();
       return view('admin.user.danhsach',['user'=> $user]);
    }
    public function getThem()
    {
       return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Phai co 3 ky tu',

            'email.required' => 'Ban chua nhap email',
            'email.email' => 'Ban chua nhap dung dinh danh email',
            'email.unique' => 'Email da ton tai',
            'password.required' => 'Ban chua nhapmat khau',
            'password.min' => 'Mat khau phai co it nhat 3 ky tu',
            'password.max' => 'Mat khau phai co nhieu nhat 32 ky tu',
            'passwordAgain.required'=> 'Ban chua nhap lai mat khau',
            'passwordAgain.same' => 'Mat khau nhap lai chua khop'

        ]);
        $user = new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->quyen= $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Them thanh cong');
        
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id )
    {
        $this->validate($request,[
            'name' => 'required|min:3',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Phai co 3 ky tu',
        ]);
        $user = User::find($id);
        $user->name= $request->name;
        $user->quyen= $request->quyen;


        // if($request->changePassword == "on") trungquandev.com giai thich la khong sua dc mat khau
        if(isset($request->changePassword ))
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
        return redirect('admin/user/sua/'.$id)->with('thongbao','ban da sua thanh cong');
    }
    public function getXoa($id)
    {
        $user = User::find($id);
        //Xóa các comment của user
        $comment = Comment::where('idUser',$id); 
        $comment->delete(); 
        //Xóa điểm của user
        $userpoint = UserPoint::where('idUser',$id);
        $userpoint->delete();
        //Xóa diary của user
        $diaryenglish = DiaryEnglish::where('idUser',$id);
        $diaryenglish->delete();

        $user->delete(); //Xóa user
        return redirect('admin/user/danhsach')->with('thongbao','Xóa tài khoản thành công');
      
    }
    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Ban chua nhap email',
            'password.required'=>'Banh chua nhap Password',
            'password.min'=>'password nho hon 3 ky tu',
            'password.max'=>'password khong duoc lon hon 32 ky tu'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/theloai/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Dang nhap khong thanh cong');
        }
         
    }

    //Xài chung hàm đăng xuất với học sinh
    // public function getDangxuatAdmin()
    // {
    //     Auth::logout();
    //     return redirect('admin/dangnhap');
    // }

}

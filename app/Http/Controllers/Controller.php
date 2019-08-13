<?php

namespace App\Http\Controllers;
use App\TinTuc;

use Illuminate\Support\Facades\Auth;//Dang nhap

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function _contruct()
    {
        $this->Dangnhap();
    }

    function Dangnhap()
    {
        if(Auth::check())
        {
            view()->share('user_login',Auth::user());
        }
    }
    
}
trait AddViewCountToTinTuc {

    public function addViewCount($id)
    {
        $tintuc =TinTuc::find($id);
        $tintuc->SoLuotXem =$tintuc->SoLuotXem + 1;
        $tintuc->save();
    }
}

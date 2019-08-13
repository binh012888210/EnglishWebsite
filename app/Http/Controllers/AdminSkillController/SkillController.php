<?php

namespace App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    //
    public function getDanhSach()
    {
        $skill = Skill::all();
        return view('admin.skill.danhsach',['skill'=>$skill]);
    }
}

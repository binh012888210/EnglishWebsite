<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillLesson extends Model
{
    //
    protected $table = "SkillLesson";
    public function skill()
    {
        return $this->belongsTo('App\Skill','idSkill','id');
    }
    public function skilllessonpage()
    {
        return $this->hasMany('App\SkillLessonPage','idSkillLesson','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = "Skill";
    public function skilllesson()
    {
        return $this->hasMany('App\SkillLesson','idSkill','id');
    }
    public function skilllessonpage()
    {
        return $this->hasManyThrough('App\SkillLessonPage', 'App\SkillLesson','idSkill','idSkillLesson','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillLessonPage extends Model
{
    //
    protected $table = "SkillLessonPage";
    public function skilllesson()
    {
        return $this->belongsTo('App\SkillLesson','idSkillLesson','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillExercisePage extends Model
{
    protected $table = "SkillExercisePage";
    public function skilllessonpage()
    {
        return $this->belongsTo('App\SkillLessonPage','idSkillLessonPage','id');
    }
}

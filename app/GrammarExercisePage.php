<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrammarExercisePage extends Model
{
    protected $table = "GrammarExercisePage";
    public function grammarlessonpage()
    {
        return $this->belongsTo('App\GrammarLessonPage','idGrammarLessonPage','id');
    }
}

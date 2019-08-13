<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrammarLessonPage extends Model
{
    //
    protected $table = "GrammarLessonPage";
    public function grammarlesson()
    {
        return $this->belongsTo('App\GrammarLesson','idGrammarLesson','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}

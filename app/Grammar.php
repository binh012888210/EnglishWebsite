<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    //
    protected $table = "Grammar";
    public function grammarlesson()
    {
        return $this->hasMany('App\GrammarLesson','idGrammar','id');
    }
    public function grammarlessonpage()
    {
        return $this->hasManyThrough('App\GrammarLessonPage', 'App\GrammarLesson','idGrammar','idGrammarLesson','id');
    }
}

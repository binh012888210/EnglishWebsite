<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrammarLesson extends Model
{
    //
    protected $table = "GrammarLesson";
    public function grammar()
    {
        return $this->belongsTo('App\Grammar','idGrammar','id');
    }
    public function grammarlessonpage()
    {
        return $this->hasMany('App\GrammarLessonPage','idGrammarLesson','id');
    }
}

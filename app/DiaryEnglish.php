<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryEnglish extends Model
{
    //
    protected $table = "DiaryEnglish";
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}

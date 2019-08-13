<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    //
    protected $table = "UserPoint";
    //protected $primaryKey = 'idUser';//set primary key de search user cho viec cong diem
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}

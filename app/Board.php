<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title', 'contents'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
}
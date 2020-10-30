<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Explorerecord extends Model
{
    public function post() // table之間的關係
    {
        
        return $this->belongsTo('App\Post'); //()內為上述的檔案位置

    }
}

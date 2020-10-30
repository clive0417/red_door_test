<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['post_id','name','comment'];
    public function post() // table之間的關係
    {
        
        return $this->belongsTo('App\Post'); //()內為上述的檔案位置

    }

    public function user() // table之間的關係
    {
        
        return $this->belongsTo('App\User'); //()內為上述的檔案位置

    }
}

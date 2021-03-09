<?php

namespace App;

use App\Repositories\Tags;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}

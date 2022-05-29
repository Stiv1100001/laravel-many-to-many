<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "author", 'text', 'img', 'slug'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}

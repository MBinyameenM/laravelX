<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name'];

    public function posts()
    {
    	return $this->morphedByMany(Post::class,'taggable')->withTimestamps();
    }

    public function videos()
    {
    	return $this->morphedByMany(Video::class,'taggable')->withTimestamps();
    }
}

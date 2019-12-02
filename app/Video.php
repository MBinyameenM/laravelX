<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['path','post_id'];

    public function tags()
    {
    	return $this->MorphToMany(Tag::class,'taggable')->withTimestamps();
    }

    public function post()
    {
    	return $this->belongsTo(Post::class,'post_id');
    }
}

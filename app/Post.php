<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','user_id','content']; 

    public function tags()
    {
    	return $this->MorphToMany(Tag::class,'taggable')->withTimestamps();
    }

    public function author()
    {
    	return $this->belongsTo(User::class,'user_id');
    }

    public function videos()
    {
    	return $this->hasMany(Video::class);
    }

}

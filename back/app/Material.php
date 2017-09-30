<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model{
    protected $fillable = [
    	"user_id", "title", "content" 
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function likes(){
    	return $this->hasMany(Like::class, 'id')->whereType('material');
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}

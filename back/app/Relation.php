<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model{
    protected $fillable = [
    	'person', 'star'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'star');
    }
}

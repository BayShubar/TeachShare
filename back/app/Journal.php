<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model{
    protected $fillable = [
    	'user_id'
    ];


    public function subjects(){
    	return $this->hasMany(Subject::class);
    }
}

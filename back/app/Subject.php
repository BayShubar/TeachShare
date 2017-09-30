<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model{
    protected $fillable = [
    	'journal_id', 'name', 'description'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class number extends Model
{
    protected $fillable=['name','mobile'];
    public function user(){
    	return $this->belongsTo(User::class);
    }

}

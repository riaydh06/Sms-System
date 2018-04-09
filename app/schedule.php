<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public function campain(){
    	return $this->belongsTo(campain::class);
    }
    public function sms(){
    	return $this->hasOne(sms::class);
    }
    public function user(){
    	return $this->belongsTo(campain::class);
    }
    public function send(){
    	return $this->hasMany(send::class);
    }
}

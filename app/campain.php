<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campain extends Model
{
    public function sms(){
    	return $this->hasOne(sms::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function schedule(){
    	return $this->hasOne(sms::class);
    }
}

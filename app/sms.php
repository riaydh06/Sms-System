<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    public function campain(){
    	return $this->belongsTo(campain::class);
    }
    
}

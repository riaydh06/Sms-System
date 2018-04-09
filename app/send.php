<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    public function schedule(){
    	return $this->belongsTo(campain::class);
    }
}

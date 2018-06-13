<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $fillable = ['type','rate'];

    public function clients(){
    	return $this->belongsToMany('App\Client');
    }
}

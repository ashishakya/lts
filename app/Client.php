<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = ['name','address','contact'];

    public function loans(){
    	return $this->belongsToMany('App\Loan');
    }
}

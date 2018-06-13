<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
      protected $fillable = ['name','rate'];

      public function clients(){

      	return $this->hasManyThrough('App\Client','App\Loan');
      }
}

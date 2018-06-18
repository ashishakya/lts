<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {
	//
	protected $fillable = ['name', 'rate'];

	public function loans() {

		//return $this->hasMany('App\Client', 'client_id', 'id');
		return $this->hasMany('App\Loan');
	}


	public function getRatePercentAttribute(){
		return $this->rate.'%';
	}

	/*
	
	 public function getRateAttribute($value) {
		return $value.'%';
		
	}
	*/

	/*public function getRateAttribute(){
		return sprintf('%s%',$this->rate);
	}*/


		

}
	
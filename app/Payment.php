<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	//
	protected $fillable = ['amount', 'loan_id', 'client_id', 'type_id'];


   /* 
   public function getInterestPercentageAttribute() {
		return sprintf('%s%',$this->loan->intrest);
	}
	
	public function getAmountRsAttribute() {
		return sprintf('Rs. %s/-', $this->amount);
	}
	*/
	
}

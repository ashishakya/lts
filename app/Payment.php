<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	//
	protected $fillable = ['amount', 'loan_id', 'client_id', 'type_id','last_date'];


   /* 
   public function getInterestPercentageAttribute() {
		return sprintf('%s%',$this->loan->intrest);
	}
	*/
	
	public function getAmountRsAttribute() {
		return sprintf('Rs.%s/-', $this->amount);
	}
	

	public function getDifferenceInDateAttribute(){
		$created_date = $this->created_at;
		$last_date = $this->last_date;
		$diff = $created_date->diffInDays($last_date);
		return $diff;
	}


	
	/*	public function getAmountAttribute($value){
		return 'Rs.'.$value;

	}
	*/
}

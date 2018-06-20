<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {
	//
	protected $fillable = ['client_id', 'type_id', 'amount', 'interest', 'issue_id', 'payment_id'];

	public function clients() {
		return $this->belongsTo('App\Client', 'client_id', 'id');
	}

	public function types() {
		return $this->belongsTo('App\Type', 'type_id', 'id');
	}

	public function payments() {
		//return $this->hasMany('App\Payment', 'payment_id', 'id');
		return $this->hasMany('App\Payment');
	}

	public function getInterestRateAttribute() {
		//return sprintf('%s',$this->interest);
		return $this->interest . '%';
	}

	public function getAmountRsAttribute() {
		return sprintf('Rs.%s/-', $this->amount);
	}

}

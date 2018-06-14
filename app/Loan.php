<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {
	//
	protected $fillable = ['client_id', 'type_id', 'amount', 'interest', 'issue_id', 'payment_id'];

	public function clients() {
		return $this->belongsToMany('App\Client');
	}

	public function payments() {
		return $this->hasMany('App\Payment');
	}

	public function getInterestAttribute($value) {
		return $value . '%';
	}

	public function getAmountAttribute($value) {
		return 'Rs.' . $value . '/-';
	}
}

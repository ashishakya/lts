<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
	//
	protected $fillable = ['name', 'address', 'contact'];

	public function types() {
		//return $this->belongsToMany('App\Loan');

		return $this->hasManyThrough(
			'App\Type',
			'App\Loan',
			'client_id',
			'id',
			'id',
			'type_id'
		);

	}

	public function loans() {
		return $this->hasMany('App\Loan');
	}
}

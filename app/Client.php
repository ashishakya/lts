<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
	//
	protected $fillable = ['name', 'address', 'contact'];

//	public function types() {
//		//return $this->belongsToMany('App\Loan');
//
//		return $this->hasManyThrough(
//			'App\Type',
//			'App\Loan',
//			'client_id',
//			'id',
//			'id',
//			'type_id'
//		);
//
//	}

	public function loans() {
		//return $this->hasMany('App\Loan');
        return $this->hasMany(Loan::class);
	}

	public function setAddressAttribute($address){
	    return $this->attributes['address'] = ucwords($address);
    }

    public function setNameAttribute($name){
        return $this->attributes['name'] = ucwords($name);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
	//
	protected $fillable = ['name', 'address', 'contact'];


//	}

	public function loans() {
        return $this->hasMany(Loan::class);
	}

	public function setAddressAttribute($address){
	    return $this->attributes['address'] = ucwords($address);
    }

    public function setNameAttribute($name){
        return $this->attributes['name'] = ucwords($name);
    }
}

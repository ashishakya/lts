<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $fillable = ['name', 'rate'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function getRatePercentAttribute()
    {
        return $this->rate.'%';
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords($name);
    }


}

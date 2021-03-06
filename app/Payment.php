<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['amount', 'loan_id', 'client_id', 'type_id', 'last_date', 'pbp', 'pap', 'interest_amount', 'interest_paid'];

    public function client()
    {
        //return $this->belongsTo('App\Client');
        return $this->belongsTo(Client::class);
    }

    public function type()
    {
        //return $this->belongsTo('App\Type');
        return $this->belongsTo(Type::class);
    }

    public function getAmountRsAttribute()
    {
        return sprintf('Rs.%s/-', $this->amount);
    }

    public function getPbpRsAttribute()
    {
        return sprintf('Rs.%s/-', $this->pbp);
    }

    public function getPapRsAttribute()
    {
        return sprintf('Rs.%s/-', $this->pap);
    }

    public function getCreatedAtDateOnlyAttribute()
    {
        return $this->created_at->toDateString();
    }

    public function getLastDateOnlyAttribute()
    {
        $lastDate = Carbon::parse($this->last_date)->toDateString();

        return $lastDate;
    }

    public function getDifferenceInDateAttribute()
    {
        // pankaj dai
        /*$createdDate = $this->created_at->toDateString();
        $lastDate = Carbon::parse($this->last_date)->toDateString();
        $diff = Carbon::parse($createdDate)->diffInDays(Carbon::parse($lastDate));
        return $diff;
        */


        $createdDate = $this->created_at;
        $lastDate    = Carbon::parse($this->last_date);
        $diff        = diffInDate($createdDate, $lastDate);

        return $diff;

    }

    public function getInterestAmountRoundValueAttribute()
    {
        return sprintf('Rs.%s/-', round($this->interest_amount, 2));
    }

    public function getPaymentIdAttribute()
    {
        return sprintf('PID-%s', $this->id);
    }


}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $fillable = ['client_id', 'type_id', 'amount', 'interest', 'issue_id', 'payment_id', 'loan_clear'];

    public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function types()
    {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

    public function payments()
    {

        return $this->hasMany(Payment::class);
    }

    public function getInterestRateAttribute()
    {
        return $this->interest.'%';
    }

    public function getAmountRsAttribute()
    {
        return sprintf('Rs.%s/-', $this->amount);
    }

    public function getLoanIdAttribute()
    {
        return sprintf('LID-%s', $this->id);
    }

    public function getSumOfAmountAttribute()
    {
        return sprintf('Rs.%s/-', $this->payments()->sum('amount'));

    }

    public function getSumOfAllInterestAttribute()
    {
        return sprintf('Rs.%s/-', round($this->payments()->sum('interest_amount', 4)));
    }

    public function getSumOfPayableInterestAttribute()
    {
        return sprintf('Rs.%s/-', round($this->payments()->where('interest_paid', 0)->sum('interest_amount')));
    }


    public function getInterestTillDateAttribute()
    {
        $rate             = $this->interest;
        $principal        = $this->payments()->orderBy('id', 'desc')->first()->pap;
        $previousDate     = $this->payments()->orderBy('id', 'desc')->first()->created_at;
        $today            = Carbon::now();
        $diff             = diffInDate($previousDate, $today);
        $interestTillDate = ($principal * $diff * $rate) / (100 * 365);

        return sprintf('Rs. %s/-', round($interestTillDate, 2));
    }
}

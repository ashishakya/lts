<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	//
	protected $fillable = ['amount', 'loan_id', 'client_id', 'type_id', 'last_date', 'pbp', 'pap', 'interest_amount'];

	public function getAmountRsAttribute() {
		return sprintf('Rs.%s/-', $this->amount);
	}

	public function getPbpRsAttribute() {
		return sprintf('Rs.%s/-', $this->pbp);
	}

	public function getPapRsAttribute() {
		return sprintf('Rs.%s/-', $this->pap);
	}

	public function getCreatedAtDateOnlyAttribute() {
		return $this->created_at->toDateString();
	}

	public function getLastDateOnlyAttribute() {
		$lastDate = Carbon::parse($this->last_date)->toDateString();
		return $lastDate;
	}

	public function getDifferenceInDateAttribute() {
		// pankaj dai
		$createdDate = $this->created_at->toDateString();
		$lastDate = Carbon::parse($this->last_date)->toDateString();
		$diff = Carbon::parse($createdDate)->diffInDays(Carbon::parse($lastDate));
		return $diff;
	}

	public function getInterestAmountRoundValueAttribute() {
		return round($this->interest_amount, 2);
	}

}

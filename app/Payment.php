<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	//
	protected $fillable = ['amount', 'loan_id', 'client_id', 'type_id', 'last_date', 'pbp', 'pap'];

	/*
		   public function getInterestPercentageAttribute() {
				return sprintf('%s%',$this->loan->intrest);
			}
	*/

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
		/* error in diff in date
			$created_date = $this->created_at;
			$last_date = $this->last_date;
			$diff = $created_date->diffInDays($last_date);
			return $diff;
		*/

		// pankaj dai
		$createdDate = $this->created_at->toDateString();
		$lastDate = Carbon::parse($this->last_date)->toDateString();
		$diff = Carbon::parse($createdDate)->diffInDays(Carbon::parse($lastDate));
		return $diff;

	}

	/* //difference in date reference
		$now = Carbon::today();
		$later = Carbon::today()->addDays(10);
		$diff = $later->diffInDays($now);
	*/
}

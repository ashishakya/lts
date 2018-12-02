<?php


use Carbon\Carbon;


function formattedDate($date)
{
    $date = new Carbon($date);

    return $date->toDateString();

}

function diffInDate($previousDate, $laterDate)
{
    $previousDate = Carbon::parse($previousDate->toDateString());
    $laterDate    = Carbon::parse($laterDate->toDateString());
    $difference = $previousDate->diffInDays($laterDate);
    return $difference;

}
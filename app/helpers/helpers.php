<?php


use Carbon\Carbon;


function formattedDate($date)
{
    $date = new Carbon($date);

    return $date->toDateString();

}
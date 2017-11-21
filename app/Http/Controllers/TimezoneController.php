<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimezoneRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class TimezoneController extends Controller
{
    public function convert(TimezoneRequest $request)
    {

        $fromZone = $request->get('from-zone');
        $fromDate = $request->get('from-date');
        $fromTime = $request->get('from-time');
        $toZone = $request->get('to-zone');

        $date = new \DateTime($fromDate . $fromTime, new \DateTimeZone($fromZone));
        $date->setTimezone(new \DateTimeZone($toZone));

        return $date->format('m/d/Y g:i A');
    }
}

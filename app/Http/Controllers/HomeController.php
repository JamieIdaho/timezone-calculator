<?php

namespace App\Http\Controllers;

use DateTimeZone;

class HomeController extends Controller
{
    public function home()
    {

        $regions = [
            [
                'regionName' => 'Africa',
                'regionKey'  => DateTimeZone::AFRICA
            ],
            [
                'regionName' => 'America',
                'regionKey'  => DateTimeZone::AMERICA
            ],
            [
                'regionName' => 'Antarctica',
                'regionKey'  => DateTimeZone::ANTARCTICA
            ],
            [
                'regionName' => 'Asia',
                'regionKey'  => DateTimeZone::ASIA
            ],
            [
                'regionName' => 'Atlantic',
                'regionKey'  => DateTimeZone::ATLANTIC
            ],
            [
                'regionName' => 'Europe',
                'regionKey'  => DateTimeZone::EUROPE
            ],
            [
                'regionName' => 'Indian',
                'regionKey'  => DateTimeZone::INDIAN
            ],
            [
                'regionName' => 'Pacific',
                'regionKey'  => DateTimeZone::PACIFIC
            ]

        ];


        foreach ($regions as &$region) {
            $zones = DateTimeZone::listIdentifiers($region['regionKey']);
            $region['timezones'] = json_encode($zones);
        }

        return view('welcome', [
           'regions' => $regions
        ]);
    }
}

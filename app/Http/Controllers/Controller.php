<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function GetWeekDayArray()
    {
        return [
            [
                'day' => 1,
                'name' => 'Sunday',
                'slug' => 'sunday',
            ],
            [
                'day' => 2,
                'name' => 'Monday',
                'slug' => 'monday',
            ],
            [
                'day' => 3,
                'name' => 'Tuesday',
                'slug' => 'tuesday',
            ],
            [
                'day' => 4,
                'name' => 'Wednesday',
                'slug' => 'wednesday',
            ],
            [
                'day' => 5,
                'name' => 'Thrusday',
                'slug' => 'thrusday',
            ],
            [
                'day' => 6,
                'name' => 'Friday',
                'slug' => 'friday',
            ],
            [
                'day' => 7,
                'name' => 'Saturday',
                'slug' => 'saturday',
            ],
        ];
    }




}

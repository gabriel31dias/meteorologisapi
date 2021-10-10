<?php

namespace App\Protocols;

use App\Models\Forecast;

interface ImeteorologistApis
{
    public function callForecast($cityname);
}
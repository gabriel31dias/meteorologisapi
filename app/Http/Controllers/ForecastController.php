<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceOpenWeathermap;
use App\Repositories\ForecastRepository;

class ForecastController extends Controller
{
    public function handleResquest($cityname){
        $result = (new ServiceOpenWeathermap(new ForecastRepository()))->callForecast($cityname);
        return response()->json($result);
    }
}

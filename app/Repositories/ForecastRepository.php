<?php

namespace App\Repositories;

use App\Models\Forecast;

class ForecastRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Forecast();
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function getLastForecastByCity($cityname)
    {
        return $getres = $this->model->where('cityname', $cityname)->whereRaw('created_at >= now() - interval 5 minute')->first();
    }


    public function create($params)
    {
        Forecast::create([
            'cityname' => $params['cityname']
            // 'weather' => $params['weather'],
            //  'temp_min' => $params['temp_min'],
            // 'temp_max' => $params['temp_max'],
            //'sea_level' => $params['sea_level'],
            //'humidity' => $params['humidity'],
            //'windspeed' => $params['windspeed'],
        ]);
    }
}
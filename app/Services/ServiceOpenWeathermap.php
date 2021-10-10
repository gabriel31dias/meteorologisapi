<?php

namespace App\Services;


use App\Repositories\ForecastRepository;
use App\Protocols\ImeteorologistApis;
use Illuminate\Support\Facades\Http;

class ServiceOpenWeathermap extends BaseMeteorologisApis implements ImeteorologistApis
{
    private $api_key;
    public $repository;


    /**
     * ServiceOpenWeathermap constructor.
     */
    public function __construct($repository)
    {
        $this->api_key = env('API_KEY');
        $this->repository = $repository;
    }


    public function requestApi($cityname)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $cityname . '&appid=' . $this->api_key)->json();
        $this->createCache($response);
        return $response;
    }






}
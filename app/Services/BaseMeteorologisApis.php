<?php

namespace App\Services;


class BaseMeteorologisApis
{

    public $cityname;
    public $cache_meteorologi;

    public function formatResult($result)
    {
        return response()->json($result);
    }

    public function callForecast($cityname)
    {
        $this->cityname = $cityname;
        if ($this->checkCache($cityname) == false) {
            $res = $this->requestApi($cityname);
        } else {
            $res = $this->getCache();
        }
        return $this->formatResult($res);
    }

    protected function checkCache($cityname)
    {
        $getlastforecastcity = $this->repository->getLastForecastByCity($cityname);
        if (isset($getlastforecastcity->id)) {
            $this->cache_meteorologi = $getlastforecastcity;
            return true;
        } else {
            return false;
        }
    }

    protected function createCache($response)
    {
        $parsedResponse = json_encode($response);
        $repo = $this->repository->create(['cityname' => $this->cityname]);
    }

    protected function getCache()
    {
        return $this->cache_meteorologi;
    }


}

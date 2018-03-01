<?php

namespace App\Http\Repositories;

use GuzzleHttp\Client;
use App\Http\Resources\Silobag;

class SmartiumRepository 
{
    var $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'http://api.silobolsas.com/',
            'timeout'  => 5.0,
        ]);
    }

    public function getSilobag($id)
    {
        $response = $this->client->request('GET', "silobags/$id");
        $data = json_decode($response->getBody(), true);
        return Silobag::make($data)->resolve();
    }
}
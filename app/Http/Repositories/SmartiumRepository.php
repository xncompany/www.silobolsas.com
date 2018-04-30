<?php

namespace App\Http\Repositories;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Resources\Silobag;
use App\Http\Resources\Alert;
use App\Http\Resources\Device;
use App\Http\Resources\Metric;
use App\Http\Resources\User;
use App\Http\Resources\SmartiumCollection;

class SmartiumRepository 
{
    var $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'http://api.silobolsas.com/',
            'timeout'  => 5.0
        ]);
    }

    /**
     * Get dashboard information for given organization
     *
     * @return Response
     */
    public function dashboard($idOrganization)
    {
        $response = $this->client->request('GET', "dashboard?organization=$idOrganization");
        return json_decode($response->getBody(), true);
    }
}
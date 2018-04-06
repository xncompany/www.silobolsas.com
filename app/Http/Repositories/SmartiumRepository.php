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
     * Get User Info by id
     *
     * @return Response
     */
    public function getUserById($id)
    {
        $response = $this->client->request('GET', "users/$id");
        $data = json_decode($response->getBody(), true);
        return User::make($data)->resolve();
    }

    /**
     * Get dashboard information for given user
     *
     * @return Response
     */
    public function dashboard($id)
    {
        $response = $this->client->request('GET', "dashboard?user=$id");
        return json_decode($response->getBody(), true);
    }
}
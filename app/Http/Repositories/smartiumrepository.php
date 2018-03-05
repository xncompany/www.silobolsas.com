<?php

namespace App\Http\Repositories;

use GuzzleHttp\Client;
use App\Http\Resources\Silobag;
use App\Http\Resources\Land;
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
            'timeout'  => 5.0,
        ]);
    }

    public function getUserById($id)
    {
        $response = $this->client->request('GET', "users/$id");
        $data = json_decode($response->getBody(), true);
        return User::make($data)->resolve();
    }

    public function getSilobag($id)
    {
        $response = $this->client->request('GET', "silobags/$id");
        $data = json_decode($response->getBody(), true);
        return Silobag::make($data)->resolve();
    }

    public function getLandsByUser($id)
    {
        $response = $this->client->request('GET', "users/$id/lands");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Land($data));
    }

    public function getSilobagsByLand($id)
    {
        $response = $this->client->request('GET', "lands/$id/silobags");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Silobag($data));
    }

    public function getDevice($id)
    {
        $response = $this->client->request('GET', "devices/$id");
        $data = json_decode($response->getBody(), true);
        $device = Device::make($data)->resolve();
        $device["metrics"] = $this->getDeviceMetrics($id);
        $device["alerts"] = $this->getDeviceAlerts($id);
        return $device;
    }

    public function getDevicesBySilobag($id)
    {
        $response = $this->client->request('GET', "silobags/$id/devices");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Device($data));
    }

    public function getDeviceMetrics($id)
    {
        $response = $this->client->request('GET', "devices/$id/metrics");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Metric($data));
    }

    public function getDeviceAlerts($id)
    {
        $response = $this->client->request('GET', "devices/$id/alerts");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Alert($data));
    }
}
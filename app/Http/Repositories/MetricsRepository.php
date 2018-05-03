<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use Illuminate\Http\Request;

class MetricsRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * List last 24hrs alerts
     *
     * @return Response
     */
    public function alerts($idOrganization)
    {
		$response = $this->client->request('GET', "alerts/$idOrganization");
        return json_decode($response->getBody(), true);
    }

    /**
     * List last 24hrs metrics
     *
     * @return Response
     */
    public function all($idOrganization)
    {
        $response = $this->client->request('GET', "metrics/$idOrganization");
        return json_decode($response->getBody(), true);
    }
}
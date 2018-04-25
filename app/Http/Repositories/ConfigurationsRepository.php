<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use Illuminate\Http\Request;

class ConfigurationsRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * List System Configurations
     *
     * @return Response
     */
    public function list()
    {
		$response = $this->client->request('GET', "configurations");
        return json_decode($response->getBody(), true);
    }

    /**
     * Update system configurations
     *
     * @return Response
     */
    public function update($body) 
    {
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "configurations", ["body" => $body, "headers" => $headers]);
        return $response->getStatusCode() == 200;
    }
}
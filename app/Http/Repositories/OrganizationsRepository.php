<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\Organization;
use Illuminate\Http\Request;

class OrganizationsRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * All organizations
     *
     * @return Response
     */
    public function list()
    {
    	$response = $this->client->request('GET', "organizations");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Organization($data));
    }

    /**
     * Create New Organization
     *
     * @return Response
     */
    public function create(Request $request) 
    {
        $body = $request->getContent();
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "organizations", ["body" => $body, "headers" => $headers]);
        $data = json_decode($response->getBody(), true);
        return Organization::make($data)->resolve();
    }

    /**
     * Delete Organization by given Id.
     *
     * @return Response
     */
    public function delete($id) {
        $response = $this->client->request('DELETE', "organizations/$id");
        $data = json_decode($response->getBody(), true);
        return $data;
    }
}
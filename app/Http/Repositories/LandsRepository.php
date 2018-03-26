<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\Land;
use App\Http\Resources\Silobag;
use Illuminate\Http\Request;

class LandsRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * List Lands for given User
     *
     * @return Response
     */
    public function list($id)
    {
        $response = $this->client->request('GET', "users/$id/lands");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Land($data));
    }

    /**
     * Create Land
     *
     * @return Response
     */
    public function create(Request $request) 
    {
        $body = $request->getContent();
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "lands", ["body" => $body, "headers" => $headers]);
        $data = json_decode($response->getBody(), true);
        return Land::make($data)->resolve();
    }

    /**
     * Delete Land for given Id
     *
     * @return Response
     */
    public function delete($id) {
        $response = $this->client->request('DELETE', "lands/$id");
        $data = json_decode($response->getBody(), true);
        return $data;
    }

    /**
     * get Silobags for given Land
     *
     * @return Response
     */
    public function silobags($idLand)
    {
        $response = $this->client->request('GET', "lands/$idLand/silobags");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Silobag($data));
    }
}
<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Repositories\LandsRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\Land;
use App\Http\Resources\Silobag;
use Illuminate\Http\Request;

class SilobagsRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    public function list($idUser)
    {
    	$list = array();
        $lands = (new LandsRepository)->list($idUser);
        foreach ($lands as $land) {
        	$land['silobags'] = (new LandsRepository)->silobags($land['id']);
        	if (!empty($land['silobags'])) {
        		$list[] = $land;
        	}
        }
        return $list;
    }

    public function create(Request $request) 
    {
        $body = $request->getContent();
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "silobags", ["body" => $body, "headers" => $headers]);
        $data = json_decode($response->getBody(), true);
        return Land::make($data)->resolve();
    }

    public function delete($id) {
        $response = $this->client->request('DELETE', "silobags/$id");
        $data = json_decode($response->getBody(), true);
        return $data;
    }
}
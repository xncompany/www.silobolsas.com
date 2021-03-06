<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Repositories\SilobagsRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\Land;
use App\Http\Resources\Silobag;
use App\Http\Resources\Device;
use App\Http\Resources\Alert;
use App\Http\Resources\Metric;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class DevicesRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * List Devices for given User
     *
     * @return Response
     */
    public function list($idUser, $idSilobag = null)
    {
    	$list = array();
        $lands = (new SilobagsRepository)->list($idUser);
        foreach ($lands as $land) 
        {
            $silobags = array();
        	foreach ($land['silobags'] as &$silobag) 
        	{
                # filter by silobag if neccesary
                if (!is_null($idSilobag) && $idSilobag != $silobag['id']) {
                    continue;
                }

        		$silobag['devices'] = (new SilobagsRepository)->devices($silobag['id']);
        		if (!empty($silobag['devices'])) {
        			$silobags[] = $silobag;
        		}
        	}

            if (!empty($silobags)) {
                $land['silobags'] = $silobags;
                $list[] = $land;
            }
        }
        return $list;
    }

    /**
     * Create Device
     *
     * @return Response
     */
    public function create(Request $request) 
    {
        $body = $request->getContent();
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $isValidLatitude = preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $request->input('latitude'));
        $isValidLongitude = preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $request->input('longitude'));

        
        if ($isValidLongitude && $isValidLongitude) {
            $a['latitude'] = $latitude;
            $a['longitude'] = $longitude;
            $body .= "&attributes=" . json_encode($a);
        }

        $body .= "&user=" . session('user')['id'];
        $body .= "&organization=" . session('user')['organization']['id'];

        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "devices", ["body" => $body, "headers" => $headers]);
        $data = json_decode($response->getBody(), true);
        return Device::make($data)->resolve();
    }

    /**
     * Delete Device by Id.
     *
     * @return Response
     */
    public function delete($id) {
        $response = $this->client->request('DELETE', "devices/$id");
        $data = json_decode($response->getBody(), true);
        return $data;
    }


    /**
     * Get Device by Id.
     *
     * @return Response
     */
    public function get($id)
    {
        $response = $this->client->request('GET', "devices/$id");
        $data = json_decode($response->getBody(), true);
        $metrics = $this->metrics($id);
        $data["metrics"] = $metrics['last'];
        $data["alerts"] = $this->alerts($id);
        $data["history"] = $metrics["history"];
        $device = Device::make($data)->resolve();
        return $device;
    }

    /**
     * Get Device Metrics by Id.
     *
     * @return Response
     */
    public function metrics($id)
    {
        $response = $this->client->request('GET', "devices/$id/metrics");
        $data = json_decode($response->getBody(), true);
        $data['last'] = SmartiumCollection::get(new Metric($data['last']));
        $data['history'] = SmartiumCollection::get(new Metric($data['history']));
        return $data;
    }

	/**
     * Get Device Alerts by Id.
     *
     * @return Response
     */
    public function alerts($id)
    {
        $data = array();
        try {
            $response = $this->client->request('GET', "devices/$id/alerts");
        } catch(RequestException $e) {
            return $data;
        }
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Alert($data));
    }
}
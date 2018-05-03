<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Repositories\MetricsRepository;

class AlertsController extends Controller
{

    /**
     * get Alerts for given User
     *
     * @return Response
     */
    public function list() {

    	$idOrganization = session('user')['organization']['id'];
        $data = (new MetricsRepository)->alerts($idOrganization);

        if (empty($data)) {
        	session(['alerts' => 0]);
        	$data = (new MetricsRepository)->all($idOrganization);
        	return view('alerts-success')->with('metrics', $data);
        }

        session(['alerts' => count($data['alerts'])]);

        $data['map'] = $this->_createMapData($data['alerts']);

        return view('alerts')
        		->with('dashboard', $data['dashboard'])
        		->with('alerts', $data['alerts'])
        		->with('map', $data['map']);
    }

    private function _createMapData($alerts) 
    {
        $map = new \stdClass();

        # default values
        $map->markers = array();
        $map->count = 0;
        $map->title = "No hay lanzas";
        $map->center = array('latitude' => '-34.603722', 'longitude' => '-58.381592');

        # clean devices without coordinates
        foreach ($alerts as $alert) 
        {
            $latitude = null;
            $longitude = null;
            $device = $alert['device'];
            foreach ($device['attributes'] as $attribute) 
            {
                if ($attribute['id'] == 1) {
                    $latitude = $attribute['description'];
                } elseif ($attribute['id'] == 2) {
                    $longitude = $attribute['description'];
                }
            }

            if (!is_null($latitude) && !is_null($longitude)) {
                $map->markers[] = array('latitude' => $latitude, 
                                        'longitude' => $longitude, 
                                        'id' => $device['id'], 
                                        'less_id' => $device['less_id']);
            }
        }

        # update title, counter & map center
        if (count($map->markers) > 0) {
            $map->count = count($map->markers);
            $map->title = $map->count . ($map->count == 1 ? ' Lanza' : ' Lanzas');
            $map->center = $map->markers[0];
        }

        return $map;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SmartiumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
	/**
     * Show home/dashboard
     *
     * @return Response
     */
    public function list() {
        $idOrganization = session('user')['organization']['id'];
        $dashboard = (new SmartiumRepository)->dashboard($idOrganization);
        $dashboard['map'] = $this->_createMapData($dashboard['devices']);

        
        session(['alerts' => $dashboard['counters']['alerts']]);

        return view('home')->with('dashboard', $dashboard);;
    }

    /**
     * Create Map Data considering only devices with coordinates
     */
    private function _createMapData($devices) 
    {
        $map = new \stdClass();

        # default values
        $map->markers = array();
        $map->count = 0;
        $map->title = "No hay lanzas";
        $map->center = array('latitude' => '-34.603722', 'longitude' => '-58.381592');

        # clean devices without coordinates
        foreach ($devices as $device) 
        {
            $latitude = null;
            $longitude = null;
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
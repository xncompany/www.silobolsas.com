<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DevicesRepository;
use App\Http\Repositories\SilobagsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DevicesController extends Controller
{

    /**
     * get Devices for given User
     *
     * @return Response
     */
    public function list() {
        $idOrganization = session('user')['organization']['id'];
        $list = (new DevicesRepository)->list($idOrganization);
        $lands = (new SilobagsRepository)->list($idOrganization);

        return view('spears')
                ->with('list', $list)
                ->with('chart', false)
                ->with('lands', $lands);
    }

    /**
     * get Devices for given User filtered by Silobag
     *
     * @return Response
     */
    public function listBySilobag($idSilobag) {
        $idOrganization = session('user')['organization']['id'];
        $list = (new DevicesRepository)->list($idOrganization, $idSilobag);
        $lands = (new SilobagsRepository)->list($idOrganization);

        $unit = isset($_GET['unit']) ? $_GET['unit'] : 1;
        $days = isset($_GET['days']) ? $_GET['days'] : 7;

        $start = date('m/d/Y', time() - (365 * 24 * 60 * 60));
        $end = date('m/d/Y');

        return view('spears')
                ->with('list', $list)
                ->with('id', $idSilobag)
                ->with('unit', $unit)
                ->with('days', $days)
                ->with('start', $start)
                ->with('end', $end)
                ->with('chart', true)
                ->with('lands', $lands);
    }

    /**
     * Delete given Device
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id) {
        return (new DevicesRepository)->delete($id);
    }

    /**
     * Create Device.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new DevicesRepository)->create($request);
    }

    /**
     * get Device by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function get($id) {
        
        $device = (new DevicesRepository)->get($id);

        if (!isset($device['dashboard'])) {
            return view('spears-empty')->with('device', $device);
        }

        return view('spears-detail')->with('device', $device);
    }
}

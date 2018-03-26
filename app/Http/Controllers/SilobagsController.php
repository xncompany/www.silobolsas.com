<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SilobagsRepository;
use App\Http\Repositories\LandsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SilobagsController extends Controller
{
    /**
     * get Silobags for given User
     *
     * @param  int  $id
     * @return Response
     */
    public function list() {
        $idUser = 1;
        $lands = (new SilobagsRepository)->list($idUser);
        return view('silobags')->with('lands', $lands);
    }

    /**
     * Create Silobag.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new SilobagsRepository)->create($request);
    }

    /**
     * Delete given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id) {
        return (new SilobagsRepository)->delete($id);
    }

    /**
     * get Silobag by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function getById($id) {
        return (new SmartiumRepository)->getSilobag($id);
    }

    /**
     * get Devices for given Silobag
     *
     * @param  int  $id
     * @return Response
     */
    public function getDevices($id) {
        return (new SmartiumRepository)->getDevicesBySilobag($id);
    }
}

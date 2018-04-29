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
        $idUser = session('user')['id'];
        $list = (new DevicesRepository)->list($idUser);
        $lands = (new SilobagsRepository)->list($idUser);
        return view('spears')->with('list', $list)->with('lands', $lands);
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

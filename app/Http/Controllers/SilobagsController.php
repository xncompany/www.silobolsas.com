<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SilobagsRepository;
use App\Http\Repositories\LandsRepository;
use Illuminate\Support\Facades\Auth;
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
        $idOrganization = session('user')['organization']['id'];
        $lands = (new LandsRepository)->list($idOrganization);
        $list = (new SilobagsRepository)->list($idOrganization);
        return view('silobags')
                ->with('list', $list)
                ->with('lands', $lands);
    }

    /**
     * get Silobags for given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function listByLand($idLand) {
        $idOrganization = session('user')['organization']['id'];
        $lands = (new LandsRepository)->list($idOrganization);
        $list = (new SilobagsRepository)->list($idOrganization, $idLand);
        return view('silobags')
                ->with('list', $list)
                ->with('lands', $lands);
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
    public function get($id) {
        return (new SilobagsRepository)->get($id);
    }

    /**
     * get Chart Data
     *
     * @param  int  $id, $days, $unit
     * @return Response
     */
    public function chart($id, $days, $unit) {
        return response()->json($this->parseChartData((new SilobagsRepository)->chart($id, $days, $unit)));
    }

    public function parseChartData($data) {

        $grouped = array();

        foreach ($data as $row) {
            $grouped[$row['less_id']][$row['date']] = $row['amount'];
        }

        $result = array();
        foreach ($grouped as $lessId => $items) {
            $device = null;
            $device['label'] = $lessId;
            $device['data'] = array();
            foreach ($items as $key => $value) {
                $device['data'][] = array($key, $value);
            }
            $result[] = $device;
        }

        return $result;
    }
}

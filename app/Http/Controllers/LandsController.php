<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\LandRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LandsController extends Controller
{
    /**
     * get Lands for given User
     *
     * @param  int  $id
     * @return Response
     */
    public function list() {
        $idUser = 1;
        $lands = (new LandRepository)->list($idUser);
        return view('lands')->with('lands', $lands);
    }

    /**
     * Delete given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id) {
        return (new LandRepository)->delete($id);
    }


    /**
     * get Silobags for given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function silobags($id) {
        return (new LandRepository)->silobags($id);
    }

    /**
     * Create land.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new LandRepository)->create($request);
    }
}
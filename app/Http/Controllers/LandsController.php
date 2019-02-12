<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\LandsRepository;
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
    public function list() 
    {
        $idOrganization = session('user')['organization']['id'];
        $lands = (new LandsRepository)->list($idOrganization);

        $extraLands = (new LandsRepository)->listByUser(session('user')['id']);

        return view('lands')->with('lands', $lands)->with('extraLands', $extraLands);
    }

    /**
     * Delete given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id) {
        return (new LandsRepository)->delete($id);
    }


    /**
     * get Silobags for given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function silobags($id) {
        return (new LandsRepository)->silobags($id);
    }

    /**
     * Create land.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new LandsRepository)->create($request);
    }
}
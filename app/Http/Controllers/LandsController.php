<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SmartiumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LandsController extends Controller
{
    /**
     * get Silobags for given Land
     *
     * @param  int  $id
     * @return Response
     */
    public function getSilobags($id) {
        return (new SmartiumRepository)->getSilobagsByLand($id);
    }
}
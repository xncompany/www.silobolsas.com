<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AlertsController extends Controller
{

    /**
     * get Alerts for given User
     *
     * @param  int  $id
     * @return Response
     */
    public function list() {
        return view('alerts');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ConfigurationsController extends Controller
{

    /**
     * get current configurations
     *
     * @param  int  $id
     * @return Response
     */
    public function list() {
        return view('configurations');
    }
}

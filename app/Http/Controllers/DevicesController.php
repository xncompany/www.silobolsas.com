<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SmartiumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DevicesController extends Controller
{
    /**
     * get Device by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function getById($id) {
        return (new SmartiumRepository)->getDevice($id);
    }

    /**
     * get Metrics for given Device
     *
     * @param  int  $id
     * @return Response
     */
    public function getMetrics($id) {
        return (new SmartiumRepository)->getDeviceMetrics($id);
    }

    /**
     * get Alerts for given Device
     *
     * @param  int  $id
     * @return Response
     */
    public function getAlerts($id) {
        return (new SmartiumRepository)->getDeviceAlerts($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SmartiumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    /**
     * get Silobag by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function getLands($id) {
        return (new SmartiumRepository)->getLandsByUser($id);
    }
}
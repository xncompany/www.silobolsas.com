<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{

    /**
     * get User by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function get() {
        $idUser = 1;
        return (new UsersRepository)->get($idUser);
    }

    /**
     * List Organizations.
     *
     * @return Response
     */
    public function organizations() {
        return (new UsersRepository)->organizations();
    }

    /**
     * List User for the given Organization.
     *
     * @return Response
     */
    public function users() {
        $idOrganization = 1;
        $users = (new UsersRepository)->usersByOrganization($idOrganization);
        return view('users')->with('users', $users);
    }
}

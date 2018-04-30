<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Session;

class UsersController extends Controller
{


    /**
     * Login a user
     *
     * @return Response
     */
    public function login(Request $request) {
        $user = (new UsersRepository)->login($request);
        if ($user == false) {
            return view('login')->with('fail', true);
        }
        return redirect()->route('home');;
    }

    /**
     * Logout a user
     *
     * @return Response
     */
    public function logout(Request $request) {
        Session::flush();
        return redirect()->route('login');
    }


    /**
     * get User by Id
     *
     * @param  int  $id
     * @return Response
     */
    public function get() {
        $idUser = session('user')['id'];
        return (new UsersRepository)->get($idUser);
    }

    /**
     * Create a new User.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new UsersRepository)->create($request);
    }

    /**
     * Delete given User.
     *
     * @return Response
     */
    public function delete($id) {
        return (new UsersRepository)->delete($id);
    }

    /**
     * Reset password for given User.
     *
     * @return Response
     */
    public function resetPassword(Request $request) {
        return (new UsersRepository)->resetPassword($request);
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
        $idOrganization = session('user')['organization']['id'];
        $users = (new UsersRepository)->usersByOrganization($idOrganization);
        return view('users')->with('users', $users);
    }
}

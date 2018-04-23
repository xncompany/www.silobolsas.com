<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrganizationsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrganizationsController extends Controller
{
    /**
     * get All Customers
     *
     * @param  int  $id
     * @return Response
     */
    public function list() {
        $list = (new OrganizationsRepository)->list();
        return view('organizations')->with('list', $list);
    }

    /**
     * Create New Customer.
     *
     * @return Response
     */
    public function create(Request $request) {
        return (new OrganizationsRepository)->create($request);
    }

    /**
     * Delete given Customer
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id) {
        return (new OrganizationsRepository)->delete($id);
    }
}

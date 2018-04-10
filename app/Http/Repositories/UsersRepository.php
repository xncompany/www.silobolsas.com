<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\User;
use App\Http\Resources\Organization;
use Illuminate\Http\Request;

class UsersRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }

    /**
     * User for given id
     *
     * @return Response
     */
    public function get($id)
    {
        $response = $this->client->request('GET', "users/$id");
        $data = json_decode($response->getBody(), true);
        return User::make($data)->resolve();
    }

    /**
     * Create User
     *
     * @return Response
     */
    public function create(Request $request) 
    {
        # string for all arguments
        $body = $request->getContent();
        # attach md5 as password
        $body .= "&password=" . md5($request->input("password1"));
        # attach fullname as json attribute
        $json['fullname'] = $request->input("fullname");
        $body .= "&attributes=" . json_encode($json);

        # go!
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $response = $this->client->request('POST', "users", ["body" => $body, "headers" => $headers]);
        $data = json_decode($response->getBody(), true);
        return User::make($data)->resolve();
    }

    /**
     * Delete User by Id.
     *
     * @return Response
     */
    public function delete($id) {
        $response = $this->client->request('DELETE', "users/$id");
        $data = json_decode($response->getBody(), true);
        return $data;
    }

    /**
     * List Organizations
     *
     * @return Response
     */
    public function organizations()
    {
        $response = $this->client->request('GET', "organizations");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new Organization($data));
    }


    /**
     * Users for the given Organization
     *
     * @return Response
     */
    public function usersByOrganization($id)
    {
        $response = $this->client->request('GET', "organizations/$id/users");
        $data = json_decode($response->getBody(), true);
        return SmartiumCollection::get(new User($data));
    }
}
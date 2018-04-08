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
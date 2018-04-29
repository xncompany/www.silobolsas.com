<?php

namespace App\Http\Repositories;

use App\Http\Repositories\SmartiumRepository;
use App\Http\Resources\SmartiumCollection;
use App\Http\Resources\User;
use App\Http\Resources\Organization;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Session;

class UsersRepository extends SmartiumRepository 
{
    public function __construct() {
    	parent::__construct();
    }


    /**
     * Login a User
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $body = $request->getContent();
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');

        try {
            $response = $this->client->request('POST', "login", ["body" => $body, "headers" => $headers]);
        } catch(RequestException $e) {
            return false;
        }

        $data = json_decode($response->getBody(), true);
        $user = User::make($data)->resolve();

        session(['user' => $user]);
        Auth::loginUsingId($user['id']);
        return true;
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

        $body .= "&user=" . session('user')['id'];
        $body .= "&organization=" . session('user')['organization']['id'];

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
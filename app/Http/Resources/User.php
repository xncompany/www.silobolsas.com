<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->resource['id'],
            'email' => $this->resource['email'],
            'isActive' => $this->resource['active'],
            'createdAt' => $this->resource['created_at'],
            'type' => array (
                'id' => $this->resource['user_type']['id'],
                'description' => $this->resource['user_type']['description']
            ),
            'organization' => array(
                'id' => $this->resource['organization']['id'],
                'description' => $this->resource['organization']['description']
            )
        ];

        if (isset($this->resource['attributes'])) 
        {
            foreach ($this->resource['attributes'] as $attribute) 
            {
                if ($attribute['user_attribute']['id'] == 1) {
                    $data['fullname'] = $attribute['description'];
                } else if ($attribute['user_attribute']['id'] == 2) {
                    $data['picture'] = $attribute['description'];
                }
            }
        }


        return $data;
    }
}

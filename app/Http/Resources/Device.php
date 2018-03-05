<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Device extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource['id'],
            'idLess' => $this->resource['less_id'],
            'idSilobag' => $this->resource['silobag'],
            'description' => $this->resource['description'],
            'isActive' => $this->resource['active'],
            'createdAt' => $this->resource['created_at'],
            'activatedAt' => $this->resource['activated_at'],
            'type' => array(
            	'id' => $this->resource['type']['id'],
            	'description' => $this->resource['type']['description'],
            	'name' => $this->resource['type']['name']
            )
        ];
    }
}

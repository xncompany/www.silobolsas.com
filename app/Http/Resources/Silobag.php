<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Silobag extends JsonResource
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
            'idLand' => $this->resource['land'],
            'description' => $this->resource['description'],
            'isActive' => $this->resource['active'],
            'createdAt' => $this->resource['created_at']
        ];
    }
}

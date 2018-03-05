<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Land extends JsonResource
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
            'description' => $this->resource['description'],
            'isActive' => $this->resource['active'],
            'user' => User::make($this->resource['user']),
            'createdAt' => $this->resource['created_at']
        ];
    }
}

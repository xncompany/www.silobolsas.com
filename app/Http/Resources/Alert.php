<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alert extends JsonResource
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
            'range' => array(
            	'min' => $this->resource['min_amount'],
            	'max' => $this->resource['max_amount']
            ),
            'createdAt' => $this->resource['created_at'],
        ];
    }
}

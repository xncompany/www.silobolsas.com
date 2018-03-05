<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Metric extends JsonResource
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
            'idDevice' => $this->resource['device'],
            'amount' => $this->resource['amount'],
            'createdAt' => $this->resource['created_at'],
            'type' => array(
            	'id' => $this->resource['metric_type']['id'],
            	'description' => $this->resource['metric_type']['description']
            ),
            'status' => array(
            	'id' => $this->resource['metric_status']['id'],
            	'description' => $this->resource['metric_status']['description']
            ),
            'unit' => array(
            	'id' => $this->resource['metric_unit']['id'],
            	'description' => $this->resource['metric_unit']['description']
            )
        ];
    }
}

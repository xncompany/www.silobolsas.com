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
        $colors = array("1" => "success", "2" => "warning", "3" => "danger");

        return [
            'id' => $this->resource['id'],
            'idDevice' => $this->resource['device'],
            'amount' => $this->resource['amount'],
            'intAmount' => intval($this->resource['amount']),
            'createdAt' => $this->resource['created_at'],
            'timestamp' => preg_replace("/[^0-9]/", "", $this->resource['created_at']),
            'value' => round($this->resource['amount'], 2) . ' ' . $this->resource['metric_unit']['description'],
            'status' => $this->resource['metric_status']['description'],
            'color' => $colors[$this->resource['metric_status']['id']],
            'type' => $this->resource['metric_type']['description'],
            'attributes' => array(
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
            )
        ];
    }
}

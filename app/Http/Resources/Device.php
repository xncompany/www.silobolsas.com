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
        $model = [
            'id' => $this->resource['id'],
            'idLess' => $this->resource['less_id'],
            'idSilobag' => $this->resource['silobag'],
            'description' => $this->resource['description'],
            'isActive' => $this->resource['active'],
            'createdAt' => $this->resource['created_at']
        ];

        if (isset($this->resource['attributes']))  {
            $this->_coordinates($model);
        }

        if (isset($this->resource['metrics']) && count($this->resource['metrics']) > 0)  {
            $model['metrics'] = $this->resource['metrics'];
            $this->_dashboard($model);
        }

        if (isset($this->resource['history'])) {
            $model['history'] = $this->resource['history'];
        }

        return $model;
    }


    /**
     * Transform the attributes into coordinates if exists
     *
     */
    private function _coordinates(&$model) 
    {
        $latitude = null;
        $longitude = null;
        foreach ($this->resource['attributes'] as $attribute) 
        {
            if ($attribute['id'] == 1) {
                $latitude = $attribute['description'];
            } elseif ($attribute['id'] == 2) {
                $longitude = $attribute['description'];
            }
        }

        if (!is_null($latitude) && !is_null($longitude)) {
            $model['coordinates'] = array('latitude' => $latitude, 'longitude' => $longitude);
        }
    }

    /**
     * Get dashboard latest information
     * Note: data from API already sorted by date DESC
     *
     */
    private function _dashboard(&$model) 
    {
        $model['dashboard']['date'] = $this->resource['metrics'][0]['createdAt'];

        $found = 0;
        foreach ($this->resource['metrics'] as $metrics) 
        {
            if (isset($model['dashboard'][$metrics['type']])) {
                continue;
            }
            $model['dashboard'][$metrics['type']]['amount'] = $metrics['intAmount'];
            $model['dashboard'][$metrics['type']]['color'] = $metrics['color'];
            $found++;
        }

        $model['dashboard']['status'] = ($found < 4);
    }
}

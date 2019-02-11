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
        $data = [
            'id' => $this->resource['id'],
            'description' => $this->resource['description'],
            'isActive' => $this->resource['active'],
            'createdAt' => $this->resource['created_at']
        ];

        if (isset($this->resource['organization'])) 
        {
            $data['organization'] = array(
                'id' => $this->resource['organization']['id'],
                'description' => $this->resource['organization']['description']
            );
        }

        return $data;
    }
}

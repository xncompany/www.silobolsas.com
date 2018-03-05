<?php
namespace App\Http\Resources;

class SmartiumCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  $obj
     * @return array
     */
    public static function get($obj)
    {
        $result = [];
        foreach ($obj->resource as $item) {
            $result[] = $obj->make($item)->resolve();
        }
        return $result;
    }
}
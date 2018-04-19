<?php

namespace Empire\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;


class UnitInfo extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $values = [
            'units' => $this->collection,
        ];
        return $values;
    }
}

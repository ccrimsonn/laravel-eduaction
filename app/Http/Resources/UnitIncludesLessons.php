<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitIncludesLessons extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $values = $this->collection;

        $grouped =$values->groupBy(function($item){

            $data = [
                'unitCode' => $item['unit_code'],
            ];
            return '' .count($data);
        });

        return $grouped;
        //return gettype($grouped);
    }

}

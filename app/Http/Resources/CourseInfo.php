<?php

namespace Empire\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseInfo extends ResourceCollection
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
            'course' => $this->collection,
        ];
        return $values;
//        $values = [
//            'lesson-name' => $this->lesson_name,
//            'lesson-code' => $this->lesson_code,
//        ];
//        return $values;
    }
}

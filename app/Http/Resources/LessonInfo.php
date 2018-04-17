<?php

namespace Empire\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LessonInfo extends ResourceCollection
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
            'classes' => $this->collection,
        ];
        return $values;
    }
}

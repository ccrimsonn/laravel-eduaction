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
        $data = $values->unique('unit_code');
//        $data = $values->map(function ($item){
//            $result = [
//                'unitCode' => $item->unit_code,
//                'classInfo' => [
//                    'classCode' => $item->lesson_code,
//                    'className' => $item->lesson_name,
//                    'classDescription' => $item->lesson_description,
//                ],
//            ];
//            return $item->unit_code;
//        });

//        $grouped = $data->mapToGroups(function ($item, $key) {
//            return [$item['unitCode'] => $item['classInfo']];
//        });

        return $data;

//        $grouped = $values->mapToGroups(function ($item, $key) {
//           $result = [
//               'unitCode' => [
//                    $item['unit_code'] => $item['unit_name'],
//                   ],
//           ];
//           return $result;
//        });
//
//
//        return $grouped;

//        $grouped =$values->groupBy(function($item){
//
//            $data = [
//                'unitCode' => $item['unit_code'],
//            ];
//            return $data;
//        });
//
//        return $grouped;
//        //return gettype($grouped);
    }

}

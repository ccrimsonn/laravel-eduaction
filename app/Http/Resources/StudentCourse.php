<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        $values = [
//            'name' => $this->collection,
//            'course-info' => new CourseInfo(StudentsCoursesInfo::get()),
//        ];
//        return $values;

        $values = [
            'email' => $this->email,
            'first_name' => $this->first_name,
            'surname' => $this->surname,
            'campus' => $this->campus,
            'course-info' => new CourseInfo(StudentsCoursesInfo::where('email', $this->email)->get()->makeHidden(['lesson_name', 'lesson_code'])),
        ];
        return $values;
    }
}

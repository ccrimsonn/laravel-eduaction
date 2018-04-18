<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $values = [
            'email' => $this->email,
            'firstName' => $this->first_name,
            'surname' => $this->surname,
            'campus' => $this->campus,
            'courseInfo' => new CourseInfo(StudentsCoursesInfo::where('email', $this->email)->get()->makeHidden([
                'lesson_name',
                'lesson_code',
                'unit_name',
                'unit_code',
                'surname',
                'first_name',
                'dob',
                'email',
                'campus',
                'lesson_description',
                'unit_description',
            ])),
        ];
        return $values;
    }
}

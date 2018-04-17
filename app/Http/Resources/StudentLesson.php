<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentLesson extends JsonResource
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
            'first_name' => $this->first_name,
            'surname' => $this->surname,
            'campus' => $this->campus,
            'unit-info' => new LessonInfo(StudentsCoursesInfo::where('email', $this->email)->get()->makeHidden([
                'unit_name',
                'unit_code',
                'course_name',
                'course_code',
                'cricos_code',
                'surname',
                'first_name',
                'dob',
                'email',
                'campus',
                'course_description',
                'unit_description',
            ])),
        ];
        return $values;    }
}

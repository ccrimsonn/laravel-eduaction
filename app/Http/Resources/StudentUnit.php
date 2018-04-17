<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentUnit extends JsonResource
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
            'unit-info' => new UnitInfo(StudentsCoursesInfo::where('email', $this->email)->get()->makeHidden([
                'lesson_name',
                'lesson_code',
                'course_name',
                'course_code',
                'cricos_code',
                'surname',
                'first_name',
                'dob',
                'email',
                'campus',
                'course_description',
                'lesson_description',
            ])),
        ];
        return $values;
    }
}

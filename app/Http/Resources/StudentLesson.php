<?php

namespace Empire\Http\Resources;

use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Resources\Json\ResourceCollection;
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
            'firstName' => $this->first_name,
            'surname' => $this->surname,
            'campus' => $this->campus,
            'courseCode' => $this->course_code,
            'unitData' => new UnitIncludesLessons(StudentsCoursesInfo::where('email', $this->email)->where('course_code', $this->course_code)->orderBy('unit_code')->get()->makeHidden([
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



        return $values;
    }
}

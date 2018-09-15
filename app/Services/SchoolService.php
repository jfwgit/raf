<?php

namespace App\Services;


use App\School;
use App\Services\Exceptions\FailSchoolCreating;

class SchoolService
{


    public function create(array $attributes): School
    {
        try {
            /** @var School $school */
            $school = new School();

            $school->name = $attributes['name'];
            $school->code = $attributes['code'];
            $school->data = $attributes['data'];
            $school->location = $attributes['location'];
            $school->teachers = $attributes['teachers'];

            $school->save();

        } catch (\Exception $e) {

            throw new FailSchoolCreating($e->getMessage());
        }

        return $school;
    }
}
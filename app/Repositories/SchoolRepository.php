<?php

namespace App\Repositories;


use App\School;
use Illuminate\Support\Collection;

class SchoolRepository
{

    /**
     * @param $id
     * @return School|null
     */
    public function findById($id): ?School
    {
        return School::find($id);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            $school = School::all()->sortBy('id');
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $school;
    }

}
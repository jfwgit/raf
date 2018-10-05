<?php

namespace App\Repositories;


use App\Teacher;
use Illuminate\Support\Collection;

class TeacherRepository
{

    /**
     * @param $id
     * @return Teacher|null
     */
    public function findById($id): ?Teacher
    {
        return Teacher::find($id);
    }

    public function getApplied(): Collection
    {
        return Teacher::where('school_id', '<>', null)->get();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            $teacher = Teacher::all()->sortBy('id');
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }
}

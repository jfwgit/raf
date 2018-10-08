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
     * @param int $page
     * @param int $limit
     * @return Collection
     */
    public function getAll(int $page, int $limit): Collection
    {
        try {
            $teacher = Teacher::all()->sortBy('id')->forPage($page, $limit);
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function countAll(): int
    {
        try {
            $teacher = Teacher::all()->count();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }
}

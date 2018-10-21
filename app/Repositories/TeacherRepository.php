<?php

namespace App\Repositories;


use App\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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

    /**
     * @param int $page
     * @param int $limit
     * @param array $options
     * @return Collection
     */
    public function getAll(int $page, int $limit, array $options): Collection
    {
        try {
            $teacher = Teacher::query();

            if(isset($options) && !empty($options)){
                $this->applyFilterOptions($teacher, $options);
            }
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return collect($teacher->get()->sortBy('id')->forPage($page, $limit));
    }

    public function getApplied(int $page, int $limit): Collection
    {
        try {
            $teacher = Teacher::where('school_id', '<>', null)
                ->get()
                ->sortBy('id')
                ->forPage($page, $limit);
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function countAll(array $options): int
    {
        try {
            $teacher = Teacher::query();

            if(isset($options) && !empty($options)){
                $this->applyFilterOptions($teacher, $options);
            }
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher->get()->count();
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function countAllApplied(): int
    {
        try {
            $teacher = Teacher::where('school_id', '<>', null)->count();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    private function applyFilterOptions(Builder $teacher, array $options): void
    {
        if($options['criminal_check'] == Teacher::CRIMINAL_DONE) {
            $teacher->where('criminal_check', '=', Teacher::CRIMINAL_DONE);
        }else{
            $teacher->where('criminal_check', '=', Teacher::CRIMINAL_NOT_DONE);
        }

        if($options['certification'] == Teacher::CERTIFICATION_TEFL) {
            $teacher->where('certification', '=', Teacher::CERTIFICATION_TEFL);
        }elseif($options['certification'] == Teacher::CERTIFICATION_CELTA) {
            $teacher->where('certification', '=', Teacher::CERTIFICATION_CELTA);
        }else{
            $teacher->where('certification', '=', Teacher::CERTIFICATION_TOEFL);
        }

        if($options['nationality'] == Teacher::TEACHER_NATIVE_SELECTED) {
            $teacher->whereIn('nationality', Teacher::TEACHER_NATIVE);
        }else{
            $teacher->whereNotIn('nationality', Teacher::TEACHER_NATIVE);
        }

        if($options['degree'] == Teacher::DEGREE_BA) {
            $teacher->where('degree', '=', Teacher::DEGREE_BA);
        }else{
            $teacher->where('degree', '=', Teacher::DEGREE_MA);
        }
    }
}

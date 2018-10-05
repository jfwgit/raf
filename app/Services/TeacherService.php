<?php

namespace App\Services;


use App\Repositories\SchoolRepository;
use App\Repositories\TeacherRepository;
use App\School;
use App\Services\Exceptions\FailSchoolCreating;
use App\Services\Exceptions\FailSchoolUpdating;
use App\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

/**
 * @property-read TeacherRepository $teacherRepository
 * @property-read Teacher $teacher
 */
class TeacherService
{
    /**
     * @var TeacherRepository
     */
    private $teacherRepository;

    /**
     * @var Teacher
     */
    private $teacher;

    public function __construct(TeacherRepository $teacherRepository, Teacher $teacher)
    {
        $this->teacherRepository = $teacherRepository;
        $this->teacher = $teacher;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            $teacher = $this->teacherRepository->getAll();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @param int $id
     * @return Teacher|null
     */
    public function findById(int $id): ?Teacher
    {
        try {
            $teacher = $this->teacherRepository->findById($id);
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    public function getApplied(): ?Collection
    {
        try {
            $teacher = $this->teacherRepository->getApplied();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

//    /**
//     * @param array $attributes
//     * @return School
//     */
//    public function create(array $attributes): Teacher
//    {
//        try {
//            /** @var School $school */
//            $teacher = new Teacher();
//
//            $school->name = $attributes['name'];
//            $school->code = $attributes['code'];
//            $school->data = $attributes['data'];
//            $school->location = $attributes['location'];
//            $school->teachers = $attributes['teachers'];
//            $school->status = $school->setActiveStatus();
//
//            $school->save();
//        } catch (\Exception $e) {
//            throw new FailSchoolCreating($e->getMessage());
//        }
//
//        return $school;
//    }

//    /**
//     * @param int $id
//     * @return RedirectResponse
//     */
//    public function deactivate(int $id): RedirectResponse
//    {
//        try {
//            /** @var School $school */
//            $school = $this->schoolRepository->findById($id);
//            $school->status = $this->school->setInactiveStatus();
//            $school->save();
//        } catch (\Exception $e) {
//            throw new FailSchoolUpdating($e->getMessage());
//        }
//
//        return redirect()->action('SchoolController@index');
//    }

//    /**
//     * @param int $id
//     * @return RedirectResponse
//     */
//    public function activate(int $id): RedirectResponse
//    {
//        try {
//            /** @var School $school */
//            $school = $this->schoolRepository->findById($id);
//            $school->status = $this->school->setActiveStatus();
//            $school->save();
//        } catch (\Exception $e) {
//            throw new FailSchoolUpdating($e->getMessage());
//        }
//
//        return redirect()->action('SchoolController@index');
//    }
}
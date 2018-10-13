<?php

namespace App\Services;


use App\Repositories\SchoolRepository;
use App\School;
use App\Services\Exceptions\FailSchoolCreating;
use App\Services\Exceptions\FailSchoolUpdating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

/**
 * @property-read SchoolRepository $schoolRepository
 * @property-read School $school
 */
class SchoolService
{
    /**
     * @var SchoolRepository
     */
    private $schoolRepository;

    /**
     * @var School
     */
    private $school;

    public function __construct(SchoolRepository $schoolRepository, School $school)
    {
        $this->schoolRepository = $schoolRepository;
        $this->school = $school;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            $school = $this->schoolRepository->getAll();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $school;
    }

    /**
     * @param int $id
     * @return School|null
     */
    public function findById(int $id): ?School
    {
        try {
            $school = $this->schoolRepository->findById($id);
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $school;
    }

    /**
     * @param array $attributes
     * @return School
     * @throws FailSchoolCreating
     */
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
            $school->status = $school->setActiveStatus();

            $school->save();
        } catch (\Exception $e) {
            throw new FailSchoolCreating($e->getMessage());
        }

        return $school;
    }

    /**
     * @param School $school
     * @param array $attributes
     * @return School
     * @throws FailSchoolUpdating
     */
    public function update(School $school, array $attributes): School
    {
        try {

            $school->name = $attributes['name'];
            $school->data = $attributes['data'];
            $school->location = $attributes['location'];
            $school->teachers = $attributes['teachers'];

            $school->save();
        } catch (\Exception $e) {
            throw new FailSchoolUpdating($e->getMessage());
        }

        return $school;
    }

    /**
     * @param School $school
     * @return void
     * @throws FailSchoolUpdating
     */
    public function deactivate(School $school): void
    {
        try {
            $school->status = $this->school->setInactiveStatus();
            $school->save();
        } catch (\Exception $e) {
            throw new FailSchoolUpdating($e->getMessage());
        }
    }

    /**
     * @param School $school
     * @return void
     * @throws FailSchoolUpdating
     */
    public function activate(School $school): void
    {
        try {
            /** @var School $school */
            $school->status = $this->school->setActiveStatus();
            $school->save();
        } catch (\Exception $e) {
            throw new FailSchoolUpdating($e->getMessage());
        }
    }
}
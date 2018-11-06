<?php

namespace App\Services;


use App\Repositories\TeacherRepository;
use App\Services\Exceptions\FailTeacherCreating;
use App\Services\Exceptions\FailTeacherUpdating;
use App\Teacher;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @property-read TeacherRepository $teacherRepository
 * @property-read Teacher $teacher
 */
class TeacherService
{

    const FILE_STORAGE_NAME = 'uploads';

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
     * @param int $page
     * @param int $limit
     * @param array $options
     * @return Collection
     * @throws \Exception
     */
    public function getAll(int $page, int $limit, array $options): Collection
    {
        try {
            $teacher = $this->teacherRepository->getAll($page, $limit, $options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function countAll(array $options = []): int
    {
        try {
            $teacher = $this->teacherRepository->countAll($options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function countAllApplied(): int
    {
        try {
            $teacher = $this->teacherRepository->countAllApplied();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
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

    public function getApplied(int $page, int $limit = 15): ?Collection
    {
        try {
            $teacher = $this->teacherRepository->getApplied($page, $limit);
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @param Request $request
     * @return Teacher
     * @throws FailTeacherCreating
     */
    public function create(Request $request): Teacher
    {
        try {
            $attributes = $request->all();
            /** @var Teacher $teacher */
            $teacher = new Teacher();

            $files = $this->resolveFilesSaving($request);

            $teacher->photo = $files['photo'] ?? null;
            $teacher->cv = $files['cv'] ?? null;
            $teacher->video = $files['video'] ?? null;

            $teacher->name = $attributes['name'];
            $teacher->age = $attributes['age'] ?? null;
            $teacher->gender = $attributes['gender'] ?? null;
            $teacher->email = $attributes['email'] ?? null;
            $teacher->phone = $attributes['phone'] ?? null;
            $teacher->degree = $attributes['degree'] ?? null;
            $teacher->certification = $attributes['certification'] ?? null;
            $teacher->criminal_check = $attributes['criminal_check'] ?? null;
            $teacher->notarized = $attributes['notorized'] ?? null;
            $teacher->authenticated = $attributes['authenticated'] ?? null;
            $teacher->desired_location = $attributes['desired'] ?? null;
            $teacher->current_location = $attributes['current'] ?? null;
            $teacher->nationality = $attributes['nationality'] ?? null;
            $teacher->pref_school = $attributes['pref_school'] ?? null;
            $teacher->experience = $attributes['experience'] ?? null;
            $teacher->salary_exp = $attributes['salary_exp'] ?? null;
            $teacher->status = Teacher::TEACHER_ACTIVE;

            $teacher->save();
        } catch (\Exception $e) {
            throw new FailTeacherCreating($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @param Teacher $teacher
     * @param Request $request
     * @return Teacher
     * @throws FailTeacherUpdating
     */
    public function update(Teacher $teacher, Request $request): Teacher
    {
        try {
            $attributes = $request->all();

            $teacher->name = $attributes['name'] ?? $teacher->name ;
            $teacher->age = $attributes['age'] ?? $teacher->age ;
            $teacher->gender = $attributes['gender'] ?? $teacher->gender ;
            $teacher->email = $attributes['email'] ?? $teacher->email ;
            $teacher->phone = $attributes['phone'] ?? $teacher->phone ;
            $teacher->degree = $attributes['degree'] ?? $teacher->degree ;
            $teacher->certification = $attributes['certification'] ?? $teacher->certification ;
            $teacher->criminal_check = $attributes['criminal_check'] ?? $teacher->criminal_check ;
            $teacher->notarized = $attributes['notorized'] ?? $teacher->notarized ;
            $teacher->authenticated = $attributes['authenticated'] ?? $teacher->authenticated ;
            $teacher->desired_location = $attributes['desired'] ?? $teacher->desired_location ;
            $teacher->current_location = $attributes['current'] ?? $teacher->current_location ;
            $teacher->nationality = $attributes['nationality'] ?? $teacher->nationality ;
            $teacher->pref_school = $attributes['pref_school'] ?? $teacher->pref_school ;
            $teacher->experience = $attributes['experience'] ?? $teacher->experience;
            $teacher->salary_exp = $attributes['salary_exp'] ?? $teacher->salary_exp;

            $teacher->save();
        } catch (\Exception $e) {
            throw new FailTeacherUpdating($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function resolveFilesSaving(Request $request): array
    {
        $fileData = [];

        if ($request->hasFile('cv') && $path = $this->storeFile($request->file('cv'))) {
            $fileData['cv'] = $path;
        }

        if ($request->hasFile('photo') && $path = $this->storeFile($request->file('photo'))) {
            $fileData['photo'] = $path;
        }

        if ($request->hasFile('video') && $path = $this->storeFile($request->file('video'))) {
            $fileData['video'] = $path;
        }

        return $fileData;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function storeFile(UploadedFile $file): string
    {
        try {
            $result = Storage::disk('public')->putFile($this->getStorePath(), new File($file->getPathname()));
        } catch (\Exception $e) {
            throw new FileException($e->getMessage());
        }

        return $result;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getStorePath(): string
    {
        return sprintf(
            '%s/%s/%s',
            static::FILE_STORAGE_NAME,
            $this->createDirName(),
            $this->createDirName()
        );
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function createDirName(): string
    {
        return substr(md5(microtime()), random_int(0, 30), 2);
    }

    /**
     * @param Teacher $teacher
     * @return void
     * @throws FailTeacherUpdating
     */
    public function deactivate(Teacher $teacher): void
    {
        try {
            $teacher->status = $this->teacher->setInactiveStatus();
            $teacher->save();
        } catch (\Exception $e) {
            throw new FailTeacherUpdating($e->getMessage());
        }
    }

    /**
     * @param Teacher $teacher
     * @return void
     * @throws FailTeacherUpdating
     */
    public function activate(Teacher $teacher): void
    {
        try {
            $teacher->status = $this->teacher->setActiveStatus();
            $teacher->save();
        } catch (\Exception $e) {
            throw new FailTeacherUpdating($e->getMessage());
        }
    }
}

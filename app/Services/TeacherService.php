<?php

namespace App\Services;


use App\Repositories\TeacherRepository;
use App\Services\Exceptions\FailSchoolCreating;
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
     * @return Collection
     * @throws \Exception
     */
    public function getAll(): Collection
    {
        try {
            $teacher = $this->teacherRepository->getAll();
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

    public function getApplied(): ?Collection
    {
        try {
            $teacher = $this->teacherRepository->getApplied();
        } catch (\Exception $e) {
            throw new \UnexpectedValueException($e->getMessage());
        }

        return $teacher;
    }

    /**
     * @param Request $request
     * @return Teacher
     * @throws FailSchoolCreating
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
            $teacher->age = $attributes['age'] ? $attributes['age'] : null;
            $teacher->gender = $attributes['gender'] ? $attributes['gender'] : null;
            $teacher->email = $attributes['email'] ? $attributes['email'] : null;
            $teacher->phone = $attributes['phone'] ? $attributes['phone'] : null;
            $teacher->degree = $attributes['degree'] ? $attributes['degree'] : null;
            $teacher->certification = $attributes['certification'] ? $attributes['certification'] : null;
            $teacher->criminal_check = $attributes['criminal_check'] ? $attributes['criminal_check'] : null;
            $teacher->notarized = $attributes['notorized'] ? $attributes['notorized'] : null;
            $teacher->authenticated = $attributes['authenticated'] ? $attributes['authenticated'] : null;
            $teacher->desired_location = $attributes['desired'] ? $attributes['desired'] : null;
            $teacher->current_location = $attributes['current'] ? $attributes['current'] : null;
            $teacher->nationality = $attributes['nationality'] ? $attributes['nationality'] : null;
            $teacher->pref_school = $attributes['pref_school'] ? $attributes['pref_school'] : null;
            $teacher->experience = $attributes['experience'] ? $attributes['experience'] : null;
            $teacher->salary_exp = $attributes['salary_exp'] ? $attributes['salary_exp'] : null;

            $teacher->save();
        } catch (\Exception $e) {
            throw new FailSchoolCreating($e->getMessage());
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
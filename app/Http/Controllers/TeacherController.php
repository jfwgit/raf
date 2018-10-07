<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;
use App\Teacher;
use App\Validators\Teacher\TeacherValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * @property-read Teacher $teacher
 * @property-read TeacherService $teacherService
 * @property-read TeacherValidator $teacherValidator
 */
class TeacherController extends Controller
{
    /**
     * @var TeacherService
     */
    protected $teacherService;

    /**
     * @var Teacher
     */
    protected $teacher;

    /**
     * @var TeacherValidator
     */
    protected $teacherValidator;

    public function __construct(TeacherService $teacherService, TeacherValidator $teacherValidator, Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->teacherService = $teacherService;
        $this->teacherValidator = $teacherValidator;
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view-teacher');
        $schoolList = $this->teacherService->getAll();

        return view('admin.teachers-applied')->with('teachers', $schoolList->toArray());
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function indexCreate(): View
    {
        $this->authorize('create-teacher');
        $schoolList = $this->teacherService->getAll();

        return view('admin.create-teacher')->with('schools', $schoolList->toArray());
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function applied(): View
    {
        $this->authorize('view-applied');

        return view('admin.teachers-applied')->with('teachers', $this->teacherService->getApplied()->toArray());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \App\Services\Exceptions\FailSchoolCreating
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request): RedirectResponse
    {
        $this->authorize('create-teacher');
        $this->teacherValidator->validateForSave($request);

        $this->teacherService->create($request->all());

        return redirect()->action('TeacherController@index');
    }
}

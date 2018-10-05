<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;
use App\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * @property-read Teacher $teacher
 * @property-read TeacherService $teacherService
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

    public function __construct(Teacher $teacher, TeacherService $teacherService)
    {
        $this->teacher = $teacher;
        $this->teacherService = $teacherService;
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view-school');
        $schoolList = $this->teacherService->getAll();

        return view('admin.teachers-applied')->withTeachers($schoolList->toArray());
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function applied(): View
    {
        $this->authorize('view-applied');

        return view('admin.teachers-applied')->withTeachers($this->teacherService->getApplied()->toArray());
    }

    /**
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): RedirectResponse
    {
        $this->authorize('create');
    }
}

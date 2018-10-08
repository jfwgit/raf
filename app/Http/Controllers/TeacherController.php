<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Services\TeacherService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use App\Teacher;
use App\Validators\Teacher\TeacherValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
/**
 * @property-read Teacher $teacher
 * @property-read TeacherService $teacherService
 * @property-read TeacherValidator $teacherValidator
 * @property-read SchoolService $schoolService
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

    /**
     * @var SchoolService
     */
    protected $schoolService;

    public function __construct(SchoolService $schoolService, TeacherService $teacherService, TeacherValidator $teacherValidator, Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->teacherService = $teacherService;
        $this->teacherValidator = $teacherValidator;
        $this->schoolService = $schoolService;
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view-teacher');
        $schoolList = $this->teacherService->getAll();

        return view('admin.teachers-applied')->with('teachers', $schoolList);
    }

    /**
     * @param int $id
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(int $id): View
    {
        $this->authorize('view-teacher');
        $teacherList = $this->teacherService->findById($id);

        return view('admin.teacher-page')->with('teacher', $teacherList);
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function indexCreate(): View
    {
        $this->authorize('create-teacher');
        $schoolList = $this->schoolService->getAll();

        return view('admin.create-teacher')->with('schools', $schoolList);
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
    public function create(Request $request)
    {
//         dd($request->file('cv'));
//         dd($request->file('photo'));
//         dd($request->file('video'));
//         return false;
        $this->authorize('create-teacher');

        if ($request->get('phone')) {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithPhoneRules(), []);
        } else {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithEmailRules(), []);
        }

        if($validator->fails()) {
            $schoolList = $this->schoolService->getAll();

            return view('admin.create-teacher')
                ->with('schools', $schoolList)
                ->with('errors', $validator->errors());
        }

        $this->teacherService->create($request);

        Session::flash('flash_message','Teacher successfully added.');

        return redirect()->action('TeacherController@index');
    }
}

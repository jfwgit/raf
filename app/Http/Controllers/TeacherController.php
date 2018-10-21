<?php

namespace App\Http\Controllers;

use App\Services\Exceptions\FailTeacherCreating;
use App\Services\Exceptions\FailTeacherUpdating;
use App\Services\SchoolService;
use App\Services\SendPulseService;
use App\Services\TeacherService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
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
 * @property-read SendPulseService $sendPulseService
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

    /**
     * @var SendPulseService
     */
    protected $sendPulseService;

    public function __construct(
        Teacher $teacher,
        SchoolService $schoolService,
        TeacherService $teacherService,
        TeacherValidator $teacherValidator,
        SendPulseService $sendPulseService
    ) {
        $this->teacher = $teacher;
        $this->schoolService = $schoolService;
        $this->teacherService = $teacherService;
        $this->teacherValidator = $teacherValidator;
        $this->sendPulseService = $sendPulseService;
    }

    /**
     * @param int $page
     * @param Request $request
     * @param int $limit
     * @return View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function index(int $page, Request $request, int $limit = 15): View
    {
        $this->authorize('view-teacher');

        $schoolList = $this->teacherService->getAll($page, $limit, $request->query());
        $pages = ceil($this->teacherService->countAll($request->query()) / $limit);

        return view('admin.teachers-list')
            ->with('teachers', $schoolList)
            ->with('pages', $pages)
            ->with('page', $page)
            ->with('filter', $request->query());
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws FailTeacherUpdating
     */
    public function deactivate(int $id): RedirectResponse
    {
        $this->authorize('deactivate-teacher');
        $teacher = $this->teacherService->findById($id);

        $this->teacherService->deactivate($teacher);

        session()->flash('flash_message', 'School '. $teacher->name .' successfully deactivated');


        return redirect()->action('TeacherController@index', ['page' => 1]);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws FailTeacherUpdating
     */
    public function activate(int $id): RedirectResponse
    {
        $this->authorize('activate-teacher');
        $teacher = $this->teacherService->findById($id);

        $this->teacherService->activate($teacher);

        session()->flash('flash_message', 'School '. $teacher->name .' successfully activated');

        return redirect()->action('TeacherController@index', ['page' => 1]);
    }
    /**
     * @param int $id
     * @return View
     * @throws AuthorizationException
     */
    public function show(int $id): View
    {
        $this->authorize('view-teacher');
        $teacher = $this->teacherService->findById($id);
        $schoolList = $this->schoolService->getAll();


        return view('admin.teacher-page')
            ->with('teacher', $teacher)
            ->with('schools', $schoolList)
            ->with('linkPhoto', '/storage/'. $teacher->photo ?? '')
            ->with('linkCV', '/storage/'. $teacher->cv ?? '')
            ->with('linkVideo', '/storage/'. $teacher->video ?? '');
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function indexCreate(): View
    {
        $this->authorize('create-teacher');
        $schoolList = $this->schoolService->getAll();

        return view('admin.create-teacher')->with('schools', $schoolList);
    }

    /**
     * @param int $page
     * @param int $limit
     * @return View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function applied(int $page, int $limit = 15): View
    {
        $this->authorize('view-applied');

        $pages = ceil($this->teacherService->countAllApplied() / $limit);

        return view('admin.teachers-applied')
            ->with('teachers', $this->teacherService->getApplied($page, $limit))
            ->with('page', $page)
            ->with('pages', $pages);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws FailTeacherCreating
     */
    public function create(Request $request): RedirectResponse
    {
        $this->authorize('create-teacher');

        if ($request->get('phone')) {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithPhoneRules(), []);
        } else {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithEmailRules(), []);
        }

        if($validator->fails()) {
            return redirect()->action('TeacherController@indexCreate')->withErrors($validator);
        }

        $this->teacherService->create($request);
        #TODO implement mail service
//        $this->sendPulseService->send($request->get('name'));

        $request->session()->flash('flash_message','Teacher successfully added.');

        return redirect()->action('TeacherController@index', ['page' => 1]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws FailTeacherUpdating
     */
    public function update(int $id, Request $request): RedirectResponse
    {
        $this->authorize('edit-teacher');

        if ($request->get('phone')) {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithPhoneRules(), []);
        } else {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithEmailRules(), []);
        }

        if($validator->fails()) {
            return redirect()->action('TeacherController@show', ['id' => $id])->withErrors($validator);
        }

        $teacher = $this->teacherService->findById($id);

        $this->teacherService->update($teacher, $request);

        $request->session()->flash('flash_message','Teacher successfully updated.');

        return redirect()->action('TeacherController@index', ['page' => 1]);
    }
}

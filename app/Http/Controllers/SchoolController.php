<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Validators\School\SchoolValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

/**
 * @property-read SchoolService $schoolService
 * @property-read SchoolValidator $schoolValidator
 */
class SchoolController extends Controller
{
    /**
     * @var SchoolService
     */
    private $schoolService;

    /**
     * @var $schoolValidator
     */
    private $schoolValidator;

    /**
     * @param SchoolService $schoolService
     * @param SchoolValidator $schoolValidator
     */
    public function __construct(
        SchoolService $schoolService,
        SchoolValidator $schoolValidator
    ) {
        $this->schoolService = $schoolService;
        $this->schoolValidator = $schoolValidator;
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view-school');
        $schoolList = $this->schoolService->getAll();

        return view('admin.school-list')->withSchools($schoolList);
    }

    /**
     * @param int $id
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(int $id): View
    {
        $this->authorize('view-school');
        $school = $this->schoolService->findById($id);

        return view('admin.school-page')->withSchool($school);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \App\Services\Exceptions\FailSchoolCreating
     */
    public function create(Request $request): RedirectResponse
    {
        $this->authorize('create-school');
        $validator = ValidatorFacade::make($request->all(), SchoolValidator::forSaveRules(), []);

        if($validator->fails()) {
            return redirect()->route('school')->withErrors($validator);
        }

        $this->schoolService->create($request->all());

        $request->session()->flash('flash_message', 'School '. $request->get('name') .' successfully updated');

        return redirect()->action('SchoolController@index');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     * @throws \App\Services\Exceptions\FailSchoolUpdating
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(int $id, Request $request): RedirectResponse
    {
        $this->authorize('edit-school');
        $validator = ValidatorFacade::make($request->all(), SchoolValidator::forSaveRules(), []);

        if($validator->fails()) {
            return redirect()->action('SchoolController@show', ['id' => $id])
                ->withErrors($validator)
                ->with('teacherData',$request->all());
        }
        $school = $this->schoolService->findById($id);

        $this->schoolService->update($school, $request->all());

        $request->session()->flash('flash_message', 'School '. $school->name .' successfully updated');

        return redirect()->action('SchoolController@index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \App\Services\Exceptions\FailSchoolUpdating
     */
    public function deactivate(int $id): RedirectResponse
    {
        $this->authorize('deactivate-school');
        $school = $this->schoolService->findById($id);

        $this->schoolService->deactivate($school);

        session()->flash('flash_message', 'School '. $school->name .' successfully deactivated');

        return redirect()->action('SchoolController@index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \App\Services\Exceptions\FailSchoolUpdating
     */
    public function activate(int $id): RedirectResponse
    {
        $this->authorize('activate-school');
        $school = $this->schoolService->findById($id);

        $this->schoolService->activate($school);

        session()->flash('flash_message', 'School '. $school->name .' successfully activated');

        return redirect()->action('SchoolController@index');
    }
}

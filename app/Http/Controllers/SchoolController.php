<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Validators\School\SchoolValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

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

        return view('admin.school-list')->withSchools($schoolList->toArray());
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
     */
    public function create(Request $request): RedirectResponse
    {
        $this->authorize('create-school');
        $this->schoolValidator->validateForSave($request);

        $school = $this->schoolService->create($request->all());

        return redirect()->action('SchoolController@index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function deactivate($id): RedirectResponse
    {
        $this->authorize('deactivate-school');
        $this->schoolService->deactivate($id);

        return redirect()->action('SchoolController@index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function activate($id): RedirectResponse
    {
        $this->authorize('activate-school');
        $this->schoolService->activate($id);

        return redirect()->action('SchoolController@index');
    }
}

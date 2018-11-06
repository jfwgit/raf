<?php

namespace App\Http\Controllers;

use App\Services\Exceptions\FailTeacherCreating;
use App\Services\SchoolService;
use App\Services\TeacherService;
use App\Validators\School\SchoolValidator;
use App\Validators\Teacher\TeacherValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

/**
 * Class HomeController
 * @package App\Http\Controllers
 *
 * @property-read TeacherService $teacherService
 * @property-read SchoolService $schoolService
 * @property-read TeacherValidator $teacherValidator
 * @property-read SchoolValidator $schoolValidator
 */
class HomeController extends Controller
{
    /** @var TeacherService $teacherService */
    private $teacherService;
    /** @var SchoolService $schoolService */
    private $schoolService;
    /** @var TeacherValidator $teacherValidator */
    private $teacherValidator;
    /** @var SchoolValidator $schoolValidator */
    private $schoolValidator;

    public function __construct(
        TeacherService $teacherService,
        SchoolService $schoolService,
        TeacherValidator $teacherValidator,
        SchoolValidator $schoolValidator
    )
    {
        $this->teacherService = $teacherService;
        $this->schoolService = $schoolService;
        $this->teacherValidator = $teacherValidator;
        $this->schoolValidator = $schoolValidator;
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws FailTeacherCreating
     */
    public function createTeacherAsGuest(Request $request): RedirectResponse
    {
        if ($request->get('phone')) {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithPhoneRules(), []);
        } else {
            $validator = ValidatorFacade::make($request->all(), TeacherValidator::forSaveWithEmailRules(), []);
        }

        if($validator->fails()) {
            return redirect(route('home'))->withErrors($validator);
        }

        $this->teacherService->create($request);
        #TODO implement mail service
//        $this->sendPulseService->send($request->get('name'));

//        $request->session()->flash('flash_message','Teacher successfully added.');

        return redirect(route('home'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \App\Services\Exceptions\FailSchoolCreating
     */
    public function createSchoolAsGuest(Request $request): RedirectResponse
    {
        $validator = ValidatorFacade::make($request->all(), SchoolValidator::forSaveRules(), []);

        if($validator->fails()) {
            return redirect()->route('home')->withErrors($validator);
        }

        $this->schoolService->create($request->all());

//        $request->session()->flash('flash_message', 'School '. $request->get('name') .' successfully updated');

        return redirect(route('home'));
    }
}

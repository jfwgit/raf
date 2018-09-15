<?php

namespace App\Http\Controllers;

use App\Services\Exceptions\FailSchoolCreating;
use App\Services\SchoolService;
use App\Validators\School\SchoolValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * @property-read SchoolService $schoolService
 * @property-read SchoolValidator $schoolValidator
 */
class AdminController extends Controller
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

    public function index()
    {
        return view('admin.admin');
    }


    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        $this->authorize('view-school');

        try {

        } catch (UnauthorizedException $e) {

        }
    }

    public function create(Request $request)
    {
        $this->authorize('create-school');
        $this->schoolValidator->validateForSave($request);

        $school = $this->schoolService->create($request->all());

        return $school;
    }
}

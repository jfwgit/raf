<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Validators\School\SchoolValidator;
use Illuminate\View\View;

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

    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.admin');
    }
}

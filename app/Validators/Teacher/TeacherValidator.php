<?php

namespace App\Validators\School;

use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * @property-read BaseValidator $baseValidator
 */
class TeacherValidator
{

    /**
     * @var BaseValidator
     */
    private $baseValidator;

    /**
     * @param BaseValidator $baseValidator
     */
    public function __construct(BaseValidator $baseValidator)
    {
        $this->baseValidator = $baseValidator;
    }

    /**
     * @param Request $request
     *
     * @throws UnprocessableEntityHttpException
     */
    public function validateForSave(Request $request): void
    {
        $requestData = $request->all();
        $this->baseValidator->validate($requestData, $this->forSaveRules());
    }

    /**
     * Contains array with rules for saving school
     *
     * @return array
     */
    protected function forSaveWithNameRules(): array
    {
        return [
            'name'      => 'required|string|min:2|max:50',
            'photo'  => 'required|string|max:250',
            'cv'      => 'required|string',
            'age'      => 'required|string|min:17|max:17',
            'ender'  => 'required|integer|min:0',
            'email'  => 'required|string|min:3|max:150',
            'phone'      => 'required|string',
            'degree'      => 'required|string|min:17|max:17',
            'certification'      => 'required|string',
            'criminal_check'      => 'required|string|min:17|max:17',
            'notarized'  => 'required|integer|min:0',
            'authenticated'  => 'required|integer|min:0',
            'desired_location'  => 'required|integer|min:0',
            'current_location'  => 'required|integer|min:0',
            'nationality'  => 'required|integer|min:0',
            'video'  => 'required|integer|min:0',
            'pref_school'  => 'required|integer|min:0',
            'experience'  => 'required|integer|min:0',
            'salary_exp'  => 'required|integer|min:0',
        ];
    }
}
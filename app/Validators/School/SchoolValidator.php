<?php

namespace App\Validators\School;

use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * @property-read BaseValidator $baseValidator
 */
class SchoolValidator
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
    protected function forSaveRules(): array
    {
        return [
            'name'      => 'required|string|min:3|max:150',
            'location'  => 'required|string|min:3|max:150',
            'data'      => 'required|string',
            'code'      => 'required|string|min:17|max:17',
            'teachers'  => 'required|integer|min:0',
        ];
    }
}
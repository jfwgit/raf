<?php

namespace App\Validators\Teacher;

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
        $this->baseValidator->validate($request->all(), $this->forSaveRules());
    }

    /**
     * Contains array with rules for saving school
     *
     * @return array
     */
    protected function forSaveRules(): array
    {
        return [
            'name' => 'required|string|min:2|max:50',
            'photo' => 'nullable|mimes:jpeg,bmp,png|max:3000',
            'cv' => 'nullable|mimes:doc,docx,pdf|max:3000',
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/quicktime|integer|max:10000',
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|integer|min:1|max:2',
            'email' => 'required|email|min:8|max:150',
            'phone' => 'nullable|string|min:8',
            'degree' => 'nullable|int|min:1|max:3',
            'subject' => 'nullable|int|min:1|max:2',
            'certification' => 'nullable|int|min:1|max:3',
            'criminal_check' => 'nullable|string|min:1|max:2',
            'notarized' => 'nullable|integer|min:0',
            'authenticated' => 'nullable|integer|min:0',
            'desired_location' => 'nullable|string',
            'current_location' => 'nullable|string',
            'nationality' => 'nullable|string',
            'pref_school' => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
            'salary_exp' => 'nullable|integer|min:0',
        ];
    }
}
<?php

declare(strict_types=1);

namespace App\Validators;

use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class BaseValidator
{
    /**
     * @param array $data
     * @param array $rules Contains array with fields for validation and appropriate rules
     * @param array $messages
     *
     * @throws UnprocessableEntityHttpException
     */
    public function validate(array $data, array $rules, array $messages = []): void
    {
        $validator = ValidatorFacade::make($data, $rules, $messages);

        $this->checkValidation($validator);
    }

    /**
     * @param Validator $validator
     *
     * @throws UnprocessableEntityHttpException
     */
    protected function checkValidation(Validator $validator): void
    {
        if ($validator->fails()) {
            throw new UnprocessableEntityHttpException($validator->errors()->first());
        }
    }
}

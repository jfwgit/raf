<?php

declare(strict_types=1);

namespace App\Validators;

use Illuminate\Http\Request;

interface ValidatorInterface
{
    /**
     * @param Request $request
     */
    public function validate(Request $request): void;
}

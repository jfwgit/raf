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
     * Contains array with rules for saving school
     *
     * @return array
     */
    static function forSaveWithPhoneRules(): array
    {
        return [
            'name' => 'required|string|min:2|max:50',
            'photo' => 'nullable|mimes:jpeg,bmp,png|max:3000',
            'cv' => 'nullable|mimes:doc,docx,pdf|max:3000',
            'video' => 'nullable|mimetypes:video/x-msvideo,video/mpeg,video/x-ms-wmv,video/quicktime,video/x-flv,video/3gpp,video/MP2T,application/x-mpegURL,video/mp4|max:30720',
            'age' => 'nullable|integer|min:0|max:120',
            'gender' => 'nullable|integer|min:1|max:2',
            'email' => 'nullable|email|min:8|max:150',
            'phone' => 'required|string|min:8',
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

    static function forSaveWithEmailRules(): array
    {
        return [
            'name' => 'required|string|min:2|max:50',
            'photo' => 'nullable|mimes:jpeg,bmp,png|max:3000',
            'cv' => 'nullable|mimes:doc,docx,pdf|max:3000',
            'video' => 'nullable|mimetypes:video/x-msvideo,video/mpeg,video/x-ms-wmv,video/quicktime,video/x-flv,video/3gpp,video/MP2T,application/x-mpegURL,video/mp4|max:30720',
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
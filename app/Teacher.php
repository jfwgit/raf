<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $photo
 * @property string $cv
 * @property int $age
 * @property bool $gender
 * @property string $email
 * @property string $phone
 * @property int $degree
 * @property int $certification
 * @property bool $criminal_check
 * @property bool $notarized
 * @property bool $authenticated
 * @property string $desired_location
 * @property string $current_location
 * @property string $nationality
 * @property string $video
 * @property string $pref_school
 * @property string $experience
 * @property int $salary_exp
 *
 * @property-read School $school_id
 */
class Teacher extends Model
{
    /**
     * Constants for manage teacher gender
     */
    const GENDER_FEMALE = 0;
    const GENDER_MALE = 1;

    /**
     * Constants for manage teacher degree
     */
    const DEGREE_NONE = 0;
    const DEGREE_BA = 1;
    const DEGREE_MA = 2;

    /**
     * Constants for manage teacher certification
     */
    const CERTIFICATION_TEFL = 0;
    const CERTIFICATION_CELTA = 1;
    const CERTIFICATION_TOEFL = 2;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'cv',
        'age',
        'gender',
        'email',
        'phone',
        'degree',
        'certification',
        'criminal_check',
        'notarized',
        'authenticated',
        'desired_location',
        'current_location',
        'nationality',
        'video',
        'pref_school',
        'experience',
        'salary_exp',
    ];
}

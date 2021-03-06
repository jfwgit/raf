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
 * @property int $status
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
    const DEGREE_BA = 1;
    const DEGREE_MA = 2;
    const DEGREE_NONE = 3;

    /**
     * Constants for manage teacher certification
     */
    const CERTIFICATION_TEFL = 1;
    const CERTIFICATION_CELTA = 2;
    const CERTIFICATION_TOEFL = 3;

    /**
     * Constants for manage teacher criminal status
     */
    const CRIMINAL_DONE = 1;
    const CRIMINAL_NOT_DONE = 2;

    /**
     * Constants for manage teacher notorized status
     */
    const NOTORIZED_DONE = 1;
    const NOTORIZED_NOT_DONE = 2;

    /**
     * Constants for manage teacher authenticated status
     */
    const AUTHENTICATED_DONE = 1;
    const AUTHENTICATED_NOT_DONE = 2;

    /**
     * Constants for manage teachers statuses
     */
    const TEACHER_INACTIVE = 0;
    const TEACHER_ACTIVE = 1;

    /**
     * Constants for manage teacher nationality
     */
    const TEACHER_NATIVE_SELECTED = 1;

    const TEACHER_NATIVE = [
        'United States of America',
        'Canada',
        'New Zealand',
        'Australia'
    ];


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

    public function setActiveStatus()
    {
        return self::TEACHER_ACTIVE;
    }

    public function setInactiveStatus()
    {
        return self::TEACHER_INACTIVE;
    }
}

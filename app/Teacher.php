<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
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

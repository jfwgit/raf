<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $name
 * @property string $location
 * @property int $teachers
 * @property string $data
 * @property int $status
 */
class School extends Model
{
    /**
     * Constants for manage schools statuses
     */
    const SCHOOL_INACTIVE = 0;
    const SCHOOL_ACTIVE = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schools';

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
        'code',
        'name',
        'location',
        'teachers',
        'data',
        'status',
    ];

    public function setActiveStatus()
    {
        return self::SCHOOL_ACTIVE;
    }

    public function setInactiveStatus()
    {
        return self::SCHOOL_INACTIVE;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MasterMajor
 * @package App\Models
 * @version April 16, 2021, 11:13 am WIB
 *
 * @property string $name
 */
class MasterMajor extends Model
{
    use SoftDeletes;

    public $table = 'master_majors';
    
    protected $dates = ['deleted_at'];

    public $fillable = ['major_id', 'name', 'description'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'major_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'major_id' => 'required',
        'name' => 'required'
    ];

    public function major()
    {
        return $this->hasMany(UniversityMajor::class);
    }
    
}

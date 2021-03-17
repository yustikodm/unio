<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Parameter
 * @package App\Models
 * @version October 21, 2020, 8:23 am UTC
 *
 * @property string $key
 * @property string $value
 */
class Parameter extends Model
{
    use SoftDeletes;

    public $table = 'parameter';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'key',
        'value',
        'tipe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required',
        'value' => 'required',
        'tipe' => 'required'
    ];

    
}

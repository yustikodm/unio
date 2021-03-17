<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Printer
 * @package App\Models
 * @version December 21, 2020, 2:23 pm WIB
 *
 * @property string $nama
 * @property integer $default
 */
class Printer extends Model
{
    use SoftDeletes;

    public $table = 'printer';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'default'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'default' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    
}

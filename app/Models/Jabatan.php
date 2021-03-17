<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jabatan
 * @package App\Models
 * @version November 1, 2020, 12:01 pm WIB
 *
 * @property string $nama
 */
class Jabatan extends Model
{
    use SoftDeletes;

    public $table = 'jabatan';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|nullable'
    ];

    
}

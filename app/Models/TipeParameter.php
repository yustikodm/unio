<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipeParameter
 * @package App\Models
 * @version November 24, 2020, 1:50 pm WIB
 *
 * @property string $kode
 * @property string $nama
 */
class TipeParameter extends Model
{
    use SoftDeletes;

    public $table = 'tipe_parameter';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required'
    ];

    
}

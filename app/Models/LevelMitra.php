<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LevelMitra
 * @package App\Models
 * @version October 22, 2020, 5:56 pm WIB
 *
 * @property string $kode
 * @property string $nama
 */
class LevelMitra extends Model
{
    use SoftDeletes;

    public $table = 'level_mitra';


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

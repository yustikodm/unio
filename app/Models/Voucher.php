<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Voucher
 * @package App\Models
 * @version November 23, 2020, 9:41 pm WIB
 *
 * @property string $kode
 * @property string|\Carbon\Carbon $kadaluarsa
 * @property integer $diskon
 */
class Voucher extends Model
{
    use SoftDeletes;

    public $table = 'voucher';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'kadaluarsa',
        'diskon',
        'tipe',
        'jabatan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'kadaluarsa' => 'datetime',
        'diskon' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'kadaluarsa' => 'required',
        'diskon' => 'required|numeric',
        'tipe' => 'required',
    ];
}

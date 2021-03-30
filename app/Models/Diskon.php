<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Diskon
 * @package App\Models
 * @version November 23, 2020, 9:53 pm WIB
 *
 * @property integer $barang_id
 * @property integer $diskon
 */
class Diskon extends Model
{
    use SoftDeletes;

    public $table = 'diskon';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'diskon',
        'tipe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'diskon' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|numeric|unique:diskon,barang_id,NULL,id,deleted_at,NULL',
        'diskon' => 'required|numeric'
    ];

    public static $editRules = [
        'barang_id' => 'numeric',
        'diskon' => 'required|numeric',
        'tipe' => 'required'
    ];
}

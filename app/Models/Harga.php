<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Harga
 * @package App\Models
 * @version October 21, 2020, 6:05 am UTC
 *
 * @property integer $barang_id
 * @property integer $harga
 */
class Harga extends Model
{
    use SoftDeletes;

    public $table = 'harga';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'barang_id',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'harga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|numeric|unique:harga,barang_id,NULL,id,deleted_at,NULL',
        'harga' => 'required|numeric'
    ];

    public static $editRules = [
        'harga' => 'required|numeric'
    ];
}

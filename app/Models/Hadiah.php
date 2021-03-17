<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hadiah
 * @package App\Models
 * @version November 23, 2020, 9:21 pm WIB
 *
 * @property integer $barang_id
 * @property integer $poin
 * @property integer $stok
 */
class Hadiah extends Model
{
    use SoftDeletes;

    public $table = 'hadiah';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'barang_id',
        'poin',
        'stok',
        'status',
        'tanggal_kadaluarsa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'poin' => 'integer',
        'stok' => 'integer',
        'status' => 'string',
        'tanggal_kadaluarsa' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|numeric|unique:hadiah,barang_id,NULL,id,deleted_at,NULL',
        'poin' => 'required|numeric',
        'stok' => 'required|numeric',
        'status' => 'required',
        'tanggal_kadaluarsa' => 'required'
    ];

    public static $editRules = [
        'barang_id' => 'numeric',
        'poin' => 'required|numeric',
        'stok' => 'required|numeric'
    ];
}

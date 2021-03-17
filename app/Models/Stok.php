<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stok
 * @package App\Models
 * @version October 21, 2020, 6:11 am UTC
 *
 * @property integer $barang_id
 * @property integer $stok
 */
class Stok extends Model
{
    use SoftDeletes;

    public $table = 'stok';
    protected $primaryKey = 'barang_id';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'barang_id',
        'stok'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'stok' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|numeric|unique:stok,barang_id',
        'stok' => 'required|numeric'
    ];

    public static $editRules = [
        'stok' => 'required|numeric'
    ];
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangPenyesuaian
 * @package App\Models
 * @version November 22, 2020, 7:23 pm WIB
 *
 * @property integer $penyesuaian_stok_id
 * @property integer $jumlah
 */
class BarangPenyesuaian extends Model
{
    use SoftDeletes;

    public $table = 'barang_penyesuaian';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'penyesuaian_stok_id',
        'barang_id',
        'stok_database',
        'stok_lapangan',
        'tipe',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'penyesuaian_stok_id' => 'integer',
        'barang_id' => 'integer',
        'stok_database' => 'integer',
        'stok_lapangan' => 'integer',
        'tipe' => 'string',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penyesuaian_stok_id' => 'required',
        'barang_id' => 'required',
        'stok_database' => 'required',
        'stok_lapangan' => 'required',
        'tipe' => 'required',
        'jumlah' => 'required'
    ];

    
}

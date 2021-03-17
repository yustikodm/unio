<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangPenjualan
 * @package App\Models
 * @version November 3, 2020, 10:26 pm WIB
 *
 * @property integer $penjualan_id
 * @property integer $barang_id
 * @property integer $jumlah
 * @property integer $subtotal
 */
class BarangPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'barang_penjualan';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'penjualan_id' => 'integer',
        'barang_id' => 'integer',
        'harga' => 'integer',
        'jumlah' => 'integer',
        'subtotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penjualan_id' => 'required|numeric',
        'barang_id' => 'required|numeric',
        'harga' => 'required|numeric',
        'jumlah' => 'required|numeric',
        'subtotal' => 'required|numeric'
    ];

    
}

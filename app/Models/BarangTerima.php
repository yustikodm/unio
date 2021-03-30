<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangTerima
 * @package App\Models
 * @version November 3, 2020, 12:23 pm WIB
 *
 * @property integer $kirim_barang_id
 * @property integer $terima_barang_id
 * @property integer $barang_id
 * @property integer $harga
 * @property integer $qty
 */
class BarangTerima extends Model
{
    use SoftDeletes;

    public $table = 'barang_terima';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'terima_barang_id',
        'barang_id',
        'jumlah',
        'jumlah_kurang',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'terima_barang_id' => 'integer',
        'barang_id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'terima_barang_id' => 'required',
        'barang_id' => 'required',
        'jumlah' => 'required'
    ];
}

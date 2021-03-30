<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangKirim
 * @package App\Models
 * @version November 3, 2020, 11:50 am WIB
 *
 * @property integer $purchase_order_id
 * @property integer $kirim_barang_id
 * @property integer $barang_id
 * @property integer $harga
 * @property integer $jumlah
 */
class BarangKirim extends Model
{
    use SoftDeletes;

    public $table = 'barang_kirim';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kirim_barang_id',
        'barang_id',
        'jumlah',
        'jumlah_kurang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kirim_barang_id' => 'integer',
        'barang_id' => 'integer',
        'jumlah' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kirim_barang_id' => 'required',
        'barang_id' => 'required',
        'jumlah' => 'required'
    ];
}

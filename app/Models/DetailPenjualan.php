<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPenjualan
 * @package App\Models
 * @version October 26, 2020, 5:08 pm WIB
 *
 * @property integer $penjualan_id
 * @property integer $barang_id
 * @property string $catatan
 */
class DetailPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'detail_penjualan';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'penjualan_id',
        'barang_id',
        'catatan'
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
        'catatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penjualan_id' => 'required|numeric',
        'barang_id' => 'required|numeric',
        'catatan' => 'required'
    ];
}

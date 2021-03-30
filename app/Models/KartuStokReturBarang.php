<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KartuStokReturBarang
 * @package App\Models
 * @version October 21, 2020, 7:44 am UTC
 *
 * @property integer $barang_id
 * @property integer $retur_barang_id
 * @property integer $stok_awal
 * @property integer $retur
 * @property integer $stok_akhir
 * @property string $tanggal
 */
class KartuStokReturBarang extends Model
{
    use SoftDeletes;

    public $table = 'kartu_stok_retur_barang';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'retur_barang_id',
        'stok_awal',
        'retur',
        'stok_akhir',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'retur_barang_id' => 'integer',
        'stok_awal' => 'integer',
        'retur' => 'integer',
        'stok_akhir' => 'integer',
        'tanggal' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|numeric',
        'retur_barang_id' => 'required|numeric',
        'stok_awal' => 'required|numeric',
        'retur' => 'required|numeric',
        'stok_akhir' => 'required|numeric',
        'tanggal' => 'required'
    ];
}

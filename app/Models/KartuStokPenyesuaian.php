<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KartuStokPenyesuaian
 * @package App\Models
 * @version October 21, 2020, 7:49 am UTC
 *
 * @property integer $barang_id
 * @property integer $penyesuaian_id
 * @property integer $stok_awal
 * @property integer $masuk
 * @property integer $keluar
 * @property integer $stok_akhir
 * @property string $tanggal
 */
class KartuStokPenyesuaian extends Model
{
    use SoftDeletes;

    public $table = 'kartu_stok_penyesuaian';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'penyesuaian_id',
        'stok_awal',
        'masuk',
        'keluar',
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
        'penyesuaian_id' => 'integer',
        'stok_awal' => 'integer',
        'masuk' => 'integer',
        'keluar' => 'integer',
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
        'penyesuaian_id' => 'required|numeric',
        'stok_awal' => 'required|numeric',
        'masuk' => 'required|numeric',
        'keluar' => 'required|numeric',
        'stok_akhir' => 'required|numeric',
        'tanggal' => 'required'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RekapStok
 * @package App\Models
 * @version November 30, 2020, 7:34 pm WIB
 *
 * @property integer $barang_id
 * @property integer $stok_awal
 * @property integer $masuk
 * @property integer $keluar
 * @property integer $stok_akhir
 */
class RekapStok extends Model
{
    use SoftDeletes;

    public $table = 'rekap_stok';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'stok_awal',
        'masuk',
        'keluar',
        'stok_akhir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'integer',
        'stok_awal' => 'integer',
        'masuk' => 'integer',
        'keluar' => 'integer',
        'stok_akhir' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required',
        'stok_awal' => 'required',
        'masuk' => 'required',
        'keluar' => 'required',
        'stok_akhir' => 'required'
    ];
}

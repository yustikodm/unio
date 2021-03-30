<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PenyesuaianStok
 * @package App\Models
 * @version November 1, 2020, 3:28 pm WIB
 *
 * @property integer $barang_id
 * @property integer $stok_database
 * @property integer $stok_lapangan
 * @property string $tipe
 * @property integer $jumlah
 * @property string $tanggal
 */
class PenyesuaianStok extends Model
{
    use SoftDeletes;

    public $table = 'penyesuaian_stok';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        // 'stok_database',
        // 'stok_lapangan',
        // 'tipe',
        // 'jumlah',
        'tanggal',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        // 'barang_id' => 'integer',
        // 'stok_database' => 'integer',
        // 'stok_lapangan' => 'integer',
        // 'tipe' => 'string',
        // 'jumlah' => 'integer',
        'tanggal' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        // 'barang_id' => 'required|numeric',
        // 'stok_database' => 'required|numeric',
        // 'stok_lapangan' => 'required|numeric',
        // 'tipe' => 'required',
        // 'jumlah' => 'required|numeric',
        // 'tanggal' => 'required'
    ];
}

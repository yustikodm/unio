<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangRetur
 * @package App\Models
 * @version November 10, 2020, 1:04 pm WIB
 *
 * @property integer $retur_barang_id
 * @property integer $barang_id
 * @property integer $jumlah
 * @property integer $jumlah_kurang
 * @property string $status
 */
class BarangRetur extends Model
{
    use SoftDeletes;

    public $table = 'barang_retur';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'retur_barang_id',
        'barang_id',
        'jumlah',
        'jumlah_kurang',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'retur_barang_id' => 'integer',
        'barang_id' => 'integer',
        'jumlah' => 'integer',
        'jumlah_kurang' => 'integer',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'retur_barang_id' => 'required',
        'barang_id' => 'required',
        'jumlah' => 'required',
        'jumlah_kurang' => 'required',
        'keterangan' => 'required'
    ];
}

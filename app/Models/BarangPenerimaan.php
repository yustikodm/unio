<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangPenerimaan
 * @package App\Models
 * @version November 23, 2020, 1:30 pm WIB
 *
 * @property integer $penerimaan_retur_id
 * @property integer $barang_id
 * @property string $keterangan
 * @property integer $jumlah
 * @property integer $jumlah_kurang
 * @property string $status
 */
class BarangPenerimaan extends Model
{
    use SoftDeletes;

    public $table = 'barang_penerimaan';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'penerimaan_retur_id',
        'barang_id',
        'keterangan',
        'jumlah',
        'jumlah_kurang',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'penerimaan_retur_id' => 'integer',
        'barang_id' => 'integer',
        'keterangan' => 'string',
        'jumlah' => 'integer',
        'jumlah_kurang' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penerimaan_retur_id' => 'required',
        'barang_id' => 'required',
        'keterangan' => 'required',
        'jumlah' => 'required',
        'jumlah_kurang' => 'required'
    ];

    
}

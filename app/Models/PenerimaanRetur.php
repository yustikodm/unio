<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PenerimaanRetur
 * @package App\Models
 * @version November 22, 2020, 4:59 pm WIB
 *
 * @property string $kode
 * @property integer $retur_barang_id
 * @property integer $pegawai_id
 * @property integer $supplier_id
 * @property string $keterangan
 * @property string|\Carbon\Carbon $tanggal
 * @property string $status
 */
class PenerimaanRetur extends Model
{
    use SoftDeletes;

    public $table = 'penerimaan_retur';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'retur_barang_id',
        'pegawai_id',
        'supplier_id',
        'keterangan',
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
        'retur_barang_id' => 'integer',
        'pegawai_id' => 'integer',
        'supplier_id' => 'integer',
        'keterangan' => 'string',
        'tanggal' => 'datetime',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'retur_barang_id' => 'required',
        'pegawai_id' => 'required',
        'supplier_id' => 'required',
        'keterangan' => 'required',
        // 'status' => 'required'
    ];

    public static $editRules = [
        // 'retur_barang_id' => 'required',
        'pegawai_id' => 'required',
        'supplier_id' => 'required',
        'keterangan' => 'required',
        // 'status' => 'required'
    ];

    
}

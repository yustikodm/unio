<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReturBarang
 * @package App\Models
 * @version October 21, 2020, 5:47 am UTC
 *
 * @property string $kode
 * @property integer $pegawai_id
 * @property integer $supplier_id
 * @property string $keterangan
 * @property string $tanggal
 */
class ReturBarang extends Model
{
    use SoftDeletes;

    public $table = 'retur_barang';


    protected $dates = ['deleted_at'];



    public $fillable = [
        // 'kode',
        'pegawai_id',
        'supplier_id',
        'keterangan',
        // 'tanggal',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'kode' => 'string',
        'pegawai_id' => 'integer',
        'supplier_id' => 'integer',
        'keterangan' => 'string',
        // 'tanggal' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        'keterangan' => 'required',
        // 'tanggal' => 'required'
    ];
}

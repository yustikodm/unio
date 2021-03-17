<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TerimaBarang
 * @package App\Models
 * @version October 21, 2020, 5:42 am UTC
 *
 * @property integer $purchase_order_id
 * @property integer $kirim_barang_id
 * @property string $kode
 * @property integer $pegawai_id
 * @property integer $supplier_id
 * @property string $tanggal
 */
class TerimaBarang extends Model
{
    use SoftDeletes;

    public $table = 'terima_barang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'purchase_order_id',
        'kirim_barang_id',
        // 'kode',
        'pegawai_id',
        'supplier_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_order_id' => 'integer',
        'kirim_barang_id' => 'integer',
        // 'kode' => 'string',
        'pegawai_id' => 'integer',
        'supplier_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'purchase_order_id' => 'required|numeric',
        'kirim_barang_id' => 'required|numeric|unique:terima_barang,kirim_barang_id,NULL,id,deleted_at,NULL',
        // 'kode' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        // 'tanggal' => 'required'
    ];
    
    public static $editRules = [
        'purchase_order_id' => 'required|numeric',
        // 'kode' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        // 'tanggal' => 'required'
    ];

    
}

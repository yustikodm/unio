<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KirimBarang
 * @package App\Models
 * @version October 21, 2020, 5:38 am UTC
 *
 * @property integer $purchase_order_id
 * @property string $kode
 * @property integer $pegawai_id
 * @property integer $supplier_id
 * @property string $tanggal
 */
class KirimBarang extends Model
{
    use SoftDeletes;

    public $table = 'kirim_barang';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'purchase_order_id',
        'kode',
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
        'kode' => 'string',
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
        // 'kode' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        // 'tanggal' => 'required'
    ];

    public static $editRules = [
        // 'purchase_order_id' => 'numeric',
        // 'kode' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        // 'tanggal' => 'required'
    ];
}

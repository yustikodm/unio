<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PurchaseOrder
 * @package App\Models
 * @version October 21, 2020, 5:33 am UTC
 *
 * @property string $kode
 * @property string $tanggal
 * @property integer $pegawai_id
 * @property integer $supplier_id
 * @property string $status
 */
class PurchaseOrder extends Model
{
    use SoftDeletes;

    public $table = 'purchase_order';


    protected $dates = ['deleted_at'];



    public $fillable = [
        // 'kode',
        // 'tanggal',
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
        // 'kode' => 'string',
        // 'tanggal' => 'date',
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
        // 'kode' => 'required',
        // 'tanggal' => 'required',
        'pegawai_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        'status' => 'required'
    ];
}

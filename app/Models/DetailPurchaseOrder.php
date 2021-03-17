<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPurchaseOrder
 * @package App\Models
 * @version October 27, 2020, 4:37 pm WIB
 *
 * @property integer $purchase_order_id
 * @property integer $barang_id
 * @property integer $harga
 * @property integer $stok
 */
class DetailPurchaseOrder extends Model
{
    use SoftDeletes;

    public $table = 'detail_purchase_order';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'purchase_order_id',
        'barang_id',
        'jumlah',
        'jumlah_kurang',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_order_id' => 'integer',
        'barang_id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'purchase_order_id' => 'required|numeric',
        'barang_id' => 'required|numeric',
        'jumlah' => 'required|numeric'
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BarangPromo
 * @package App\Models
 * @version November 19, 2020, 1:38 pm WIB
 *
 * @property integer $promo_id
 * @property integer $barang_id
 * @property integer $jumlah
 */
class BarangPromo extends Model
{
    use SoftDeletes;

    public $table = 'barang_promo';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'promo_id',
        'barang_id',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'promo_id' => 'integer',
        'barang_id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'promo_id' => 'required',
        'barang_id' => 'required',
        'jumlah' => 'required'
    ];

    
}

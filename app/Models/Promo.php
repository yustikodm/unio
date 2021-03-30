<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Promo
 * @package App\Models
 * @version October 21, 2020, 6:01 am UTC
 *
 * @property string $nama
 * @property string $tanggal_mulai
 * @property string $tanggal_berakhir
 */
class Promo extends Model
{
    use SoftDeletes;

    public $table = 'promo';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'barang_id',
        // 'tanggal_mulai',
        // 'tanggal_berakhir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barang_id' => 'string',
        // 'tanggal_mulai' => 'date',
        // 'tanggal_berakhir' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required|unique:promo,barang_id',
        // 'tanggal_mulai' => 'required',
        // 'tanggal_berakhir' => 'required'
    ];

    public static $editRules = [
        // 'tanggal_mulai' => 'required',
        // 'tanggal_berakhir' => 'required'
    ];
}

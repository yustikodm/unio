<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogBintang
 * @package App\Models
 * @version November 9, 2020, 11:42 pm WIB
 *
 * @property integer $mitra_id
 * @property string $keterangan
 * @property integer $jumlah
 */
class LogBintang extends Model
{
    use SoftDeletes;

    public $table = 'log_bintang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'mitra_id',
        'keterangan',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mitra_id' => 'integer',
        'keterangan' => 'string',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mitra_id' => 'required|numeric',
        'keterangan' => 'required',
        'jumlah' => 'required|numeric'
    ];

    
}

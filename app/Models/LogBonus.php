<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogBonus
 * @package App\Models
 * @version December 4, 2020, 10:07 pm WIB
 *
 * @property integer $mitra_id
 * @property string $keterangan
 * @property integer $jumlah
 */
class LogBonus extends Model
{
    use SoftDeletes;

    public $table = 'log_bonus';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'mitra_id',
        'keterangan',
        'jumlah',
        'kode_transaksi',
        'nama_referral'
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
        'mitra_id' => 'required',
        'keterangan' => 'required',
        'jumlah' => 'required'
    ];


}

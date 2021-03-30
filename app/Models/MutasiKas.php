<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MutasiKas
 * @package App\Models
 * @version December 15, 2020, 10:59 am WIB
 *
 * @property string $tipe
 * @property string $keterangan
 * @property integer $jumlah
 */
class MutasiKas extends Model
{
    use SoftDeletes;

    public $table = 'mutasi_kas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'tipe',
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
        'tipe' => 'string',
        'keterangan' => 'string',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipe' => 'required',
        'keterangan' => 'required',
        'jumlah' => 'required'
    ];
}

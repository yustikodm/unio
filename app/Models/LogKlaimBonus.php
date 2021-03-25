<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogKlaimBonus
 * @package App\Models
 * @version December 11, 2020, 4:05 pm WIB
 *
 * @property integer $mitra_id
 * @property string $keterangan
 * @property integer $jumlah
 */
class LogKlaimBonus extends Model
{
    use SoftDeletes;

    public $table = 'log_klaim_bonus';


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
        'mitra_id' => 'required',
        'keterangan' => 'required',
        'jumlah' => 'required'
    ];
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HistoryKlaimHadiah
 * @package App\Models
 * @version November 25, 2020, 2:58 pm WIB
 *
 * @property integer $hadiah_id
 * @property integer $mitra_id
 * @property string $keterangan
 * @property string $status
 */
class HistoryKlaimHadiah extends Model
{
    use SoftDeletes;

    public $table = 'history_klaim_hadiah';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'hadiah_id',
        'mitra_id',
        'keterangan',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hadiah_id' => 'integer',
        'mitra_id' => 'integer',
        'keterangan' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hadiah_id' => 'required',
        'mitra_id' => 'required',
        'keterangan' => 'required',
        'status' => 'required'
    ];

    public static $editRules = [        
        'keterangan' => 'required',
        'status' => 'required'
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Poin
 * @package App\Models
 * @version October 22, 2020, 4:10 pm WIB
 *
 * @property integer $user_id
 * @property integer $poin
 */
class Poin extends Model
{
    use SoftDeletes;

    public $table = 'poin';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'mitra_id',
        'poin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mitra_id' => 'integer',
        'poin' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mitra_id' => 'required|numeric|unique:poin,mitra_id',
        'poin' => 'required|numeric'
    ];
}

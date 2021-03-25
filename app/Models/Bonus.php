<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bonus
 * @package App\Models
 * @version December 4, 2020, 9:48 pm WIB
 *
 * @property integer $mitra_id
 * @property integer $bonus
 */
class Bonus extends Model
{
    use SoftDeletes;

    public $table = 'bonus';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'mitra_id',
        'bonus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mitra_id' => 'integer',
        'bonus' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mitra_id' => 'required',
        'bonus' => 'required'
    ];

    public static $editRules = [
        'bonus' => 'required'
    ];
}

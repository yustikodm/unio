<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bintang
 * @package App\Models
 * @version October 22, 2020, 5:42 pm WIB
 *
 * @property integer $user_id
 * @property integer $bintang
 */
class Bintang extends Model
{
    use SoftDeletes;

    public $table = 'bintang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'mitra_id',
        'bintang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mitra_id' => 'integer',
        'bintang' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mitra_id' => 'required|numeric|unique:bintang,user_id',
        'bintang' => 'required|numeric'
    ];

    
}

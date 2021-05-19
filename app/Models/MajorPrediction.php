<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MajorPrediction
 * @package App\Models
 * @version May 17, 2021, 8:11 pm WIB
 *
 * @property integer $major_id
 * @property string $major_name
 * @property string $fos
 * @property string $man_check
 */
class MajorPrediction extends Model
{
    use SoftDeletes;

    public $table = 'major_prediction';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'major_id',
        'major_name',
        'fos',
        'man_check'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'major_id' => 'integer',
        'major_name' => 'string',
        'fos' => 'string',
        'man_check' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'major_id' => 'required',
        'major_name' => 'required',
        'fos' => 'required',
        'man_check' => 'required'
    ];

    
}

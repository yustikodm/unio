<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FOS
 * @package App\Models
 * @version May 25, 2021, 9:34 pm WIB
 *
 * @property string $name
 * @property string $cip
 * @property string $hc
 */
class FOS extends Model
{
    use SoftDeletes;

    public $table = 'fos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'cip',
        'hc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'cip' => 'string',
        'hc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

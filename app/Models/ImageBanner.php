<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ImageBanner
 * @package App\Models
 * @version May 31, 2021, 5:59 pm WIB
 *
 * @property string $name
 * @property string $src
 */
class ImageBanner extends Model
{
    use SoftDeletes;

    public $table = 'image_banner';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'src'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'src' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'src' => 'requried'
    ];

    
}

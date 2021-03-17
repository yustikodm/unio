<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 * @package App\Models
 * @version March 3, 2021, 11:45 pm WIB
 *
 * @property integer $user_id
 * @property integer $service_id
 * @property string $name
 * @property integer $qty
 * @property integer $price
 * @property integer $total_price
 */
class Cart extends Model
{
    use SoftDeletes;

    public $table = 'carts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'service_id',
        'name',
        'qty',
        'price',
        'total_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'service_id' => 'integer',
        'name' => 'string',
        'qty' => 'integer',
        'price' => 'integer',
        'total_price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'service_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'qty' => 'required|integer',
        'price' => 'required',
        'total_price' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}

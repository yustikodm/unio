<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Referral
 * @package App\Models
 * @version October 22, 2020, 5:48 pm WIB
 *
 * @property integer $user_id
 * @property integer $parent_id
 * @property integer $child_id
 */
class Referral extends Model
{
    use SoftDeletes;

    public $table = 'referral';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'parent_id',
        'child_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'child_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'required|numeric',
        'child_id' => 'required|numeric'
    ];
}

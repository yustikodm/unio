<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MetodePembayaran
 * @package App\Models
 * @version November 23, 2020, 10:16 pm WIB
 *
 * @property string $nama
 */
class MetodePembayaran extends Model
{
    use SoftDeletes;

    public $table = 'metode_pembayaran';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    
}

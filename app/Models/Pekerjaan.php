<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pekerjaan
 * @package App\Models
 * @version October 25, 2020, 4:11 pm WIB
 *
 * @property string $nama
 */
class Pekerjaan extends Model
{
    use SoftDeletes;

    public $table = 'pekerjaan';
    

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

    // public function pelanggan() {
    //     return $this->hasMany('App\Models\Pelanggan');
    // }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipeBarang
 * @package App\Models
 * @version November 24, 2020, 1:52 pm WIB
 *
 * @property string $kode
 * @property string $nama
 */
class TipeBarang extends Model
{
    use SoftDeletes;

    public $table = 'tipe_barang';


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

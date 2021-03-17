<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SatuanBarang
 * @package App\Models
 * @version October 20, 2020, 8:00 am UTC
 *
 * @property string $kode
 * @property string $nama
 */
class SatuanBarang extends Model
{
    use SoftDeletes;

    public $table = 'satuan_barang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required'
    ];

    
}

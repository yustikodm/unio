<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KategoriBarang
 * @package App\Models
 * @version October 20, 2020, 8:01 am UTC
 *
 * @property string $nama
 */
class KategoriBarang extends Model
{
    use SoftDeletes;

    public $table = 'kategori_barang';
    

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

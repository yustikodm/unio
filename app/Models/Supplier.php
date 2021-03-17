<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version October 20, 2020, 8:10 am UTC
 *
 * @property string $kode
 * @property string $nama
 * @property string $pic
 * @property string $alamat
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kota
 * @property string $kodepos
 * @property string $telepon
 * @property string $hp
 * @property string $email
 * @property string $kategori
 * @property string $npwp
 * @property string $rekening
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'supplier';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama',
        'pic',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'kodepos',
        'telepon',
        'hp',
        'email',
        'kategori',
        'npwp',
        'rekening'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string',
        'pic' => 'string',
        'alamat' => 'string',
        'kelurahan' => 'string',
        'kecamatan' => 'string',
        'kota' => 'string',
        'kodepos' => 'string',
        'telepon' => 'string',
        'hp' => 'string',
        'email' => 'string',
        'kategori' => 'string',
        'npwp' => 'string',
        'rekening' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        'nama' => 'required',
        'pic' => 'required',
        'alamat' => 'required',
        'kelurahan' => 'required',
        'kecamatan' => 'required',
        'kota' => 'required',
        'kodepos' => 'required',
        'telepon' => 'required',
        'hp' => 'required',
        'email' => 'required',
        'kategori' => 'required',
        'npwp' => 'required',
        'rekening' => 'required'
    ];

    
}

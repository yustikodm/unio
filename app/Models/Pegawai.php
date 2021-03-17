<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pegawai
 * @package App\Models
 * @version November 1, 2020, 11:55 am WIB
 *
 * @property string $kode
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $telepon
 * @property integer $jabatan_id
 */
class Pegawai extends Model
{
    use SoftDeletes;

    public $table = 'pegawai';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'jabatan_id',
        'user_id'
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
        'tanggal_lahir' => 'date',
        'alamat' => 'string',
        'telepon' => 'string',
        'jabatan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        'nama' => 'required',
        'tanggal_lahir' => 'required|nullable',
        'alamat' => 'required|nullable',
        'telepon' => 'required|nullable',
        'jabatan_id' => 'required|nullable|numeric'
    ];

    
}

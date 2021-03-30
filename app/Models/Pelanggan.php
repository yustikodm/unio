<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pelanggan
 * @package App\Models
 * @version October 20, 2020, 7:29 am UTC
 *
 * @property string $kode
 * @property string $nomor_ktp
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $pekerjaan
 * @property string $kota
 * @property string $alamat
 * @property string $telepon
 * @property string $hp
 * @property string $tanggal_daftar
 */
class Pelanggan extends Model
{
    use SoftDeletes;

    public $table = 'pelanggan';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'kode',
        'nomor_ktp',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'lahir_tanggal',
        'pekerjaan_id',
        'kota_id',
        'alamat',
        'telepon',
        'hp',
        'tanggal_daftar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nomor_ktp' => 'string',
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'tanggal_lahir' => 'date',
        'pekerjaan_id' => 'integer',
        'kota_id' => 'integer',
        'alamat' => 'string',
        'telepon' => 'string',
        'hp' => 'string',
        'tanggal_daftar' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        // 'nomor_ktp' => 'required',
        'nama' => 'required',
        // 'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        // 'pekerjaan_id' => 'required|numeric',
        'kota_id' => 'required|numeric',
        'alamat' => 'required',
        // 'telepon' => 'required',
        'hp' => 'required',
        // 'tanggal_daftar' => 'required'
    ];

    public function kota()
    {
        return $this->belongsTo('App\Models\Kota', 'kota_id');
    }

    // public function kota() {
    //     return $this->belongsTo('App\Models\Kota', 'kota_id');
    // }

    // public function pekerjaan() {
    //     return $this->hasOne('App\Models\Pekerjaan');
    // }
}

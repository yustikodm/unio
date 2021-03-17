<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mitra
 * @package App\Models
 * @version October 20, 2020, 8:17 am UTC
 *
 * @property string $kode
 * @property integer $pelanggan_id
 * @property string $jenis
 * @property string $tanggal_mulai
 * @property string $tanggal_akhir
 */
class Mitra extends Model
{
    use SoftDeletes;

    public $table = 'mitra';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'kode',
        'pelanggan_id',
        'level_mitra_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'user_id',
        'referral_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'pelanggan_id' => 'integer',
        'level_mitra_id' => 'integer',
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
        'user_id' => 'integer',
        'referral_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        'pelanggan_id' =>  'required|numeric|unique:mitra,pelanggan_id,NULL,id,deleted_at,NULL',
        'level_mitra_id' => 'required|numeric',
        'tanggal_mulai' => 'required',
        'tanggal_akhir' => 'required'
    ];

    public static $editRules = [

    ];

    public function pelanggan() {
        return $this->belongsTo('App\Models\Pelanggan');
    }

}

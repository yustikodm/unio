<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penjualan
 * @package App\Models
 * @version October 21, 2020, 8:11 am UTC
 *
 * @property string $kode
 * @property integer $pelanggan_id
 * @property integer $ppn
 * @property integer $diskon
 * @property integer $total
 * @property integer $bayar
 */
class Penjualan extends Model
{
    use SoftDeletes;

    public $table = 'penjualan';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'kode',
        'pelanggan_id',
        'mitra_id',
        'pegawai_id',
        'ppn',
        'voucher_id',
        'diskon_voucher',
        'diskon_mitra',
        'ongkir',
        'bonus',
        'grand_total',
        'total',
        'bayar',
        'kembali',
        'metode_pembayaran_id',
        'bank_id',
        'nama_rekening',
        'nomor_rekening',
        'status',
        'keterangan'
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
        'mitra_id' => 'integer',
        'pegawai_id' => 'integer',
        'ppn' => 'integer',
        'voucher_id' => 'integer',
        'diskon_voucher' => 'integer',
        'diskon_mitra' => 'integer',
        'total' => 'integer',
        'bayar' => 'integer',
        'kembali' => 'integer',
        'metode_pembayaran_id' => 'integer',
        'bank_id' => 'integer',
        'nama_rekening' => 'string',
        'nomor_rekening' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'kode' => 'required',
        // 'pelanggan_id' => 'numeric',
        // 'mitra_id' => 'numeric',
        'pegawai_id' => 'required|numeric',
        'ppn' => 'required|numeric',
        // 'voucher_id' => 'required|numeric',
        // 'diskon_voucher' => 'required|numeric',
        'diskon_mitra' => 'required|numeric',
        'total' => 'required|numeric',
        // 'bayar' => 'required|numeric',
        // 'kembali' => 'required|numeric',
        // 'metode_pembayaran_id' => 'required|numeric',
        // 'bank_id' => 'required|numeric',
        // 'nama_rekening' => 'required',
        // 'nomor_rekening' => 'required'
    ];


}

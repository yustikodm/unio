<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * @package App\Models
 * @version October 20, 2020, 7:55 am UTC
 *
 * @property string $kode
 * @property string $nama
 * @property string $satuan
 * @property string $kategori
 * @property string $subkategori
 */
class Barang extends Model
{
    use SoftDeletes;

    public $table = 'barang';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'kode',
        'nama',
        'satuan_id',
        'kategori_id',
        'subkategori_id',
        'tipe'
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
        'satuan_id' => 'integer',
        'kategori_id' => 'integer',
        'subkategori_id' => 'integer',
        'tipe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required',
        'satuan_id' => 'required|numeric',
        'kategori_id' => 'required|numeric',
        'subkategori_id' => 'required|numeric',
        'tipe' => 'required'
    ];

    public static function getStokHarga($id)
    {
        return Barang::leftJoin('stok', 'barang.id', '=', 'stok.barang_id')
            ->leftJoin('harga', 'barang.id', '=', 'harga.barang_id')
            ->leftJoin('diskon', 'barang.id', '=', 'diskon.barang_id')
            ->where('stok', '!=', null)
            ->where('harga', '!=', null)
            ->where('barang.id', $id)
            ->select('barang.*', 'stok.stok', 'harga.harga', 'diskon.diskon', 'diskon.tipe as tipe_diskon')->get();
    }
}

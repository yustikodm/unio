<?php

namespace App\Repositories;

use App\Models\BarangPromo;
use App\Repositories\BaseRepository;

/**
 * Class BarangPromoRepository
 * @package App\Repositories
 * @version November 19, 2020, 1:38 pm WIB
*/

class BarangPromoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'promo_id',
        'barang_id',
        'jumlah'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BarangPromo::class;
    }

    public function getBarangPromoByPromoId($promoId){
        return BarangPromo::join('promo', 'promo.id', '=', 'barang_promo.promo_id')
                          ->join('barang', 'barang.id', '=', 'barang_promo.barang_id')
                          ->join('harga', 'harga.barang_id', '=', 'barang_promo.barang_id')
                          ->join('stok', 'stok.barang_id', '=', 'barang_promo.barang_id')
                          ->select('barang_promo.*', 'barang.nama', 'harga.harga', 'stok.stok')
                          ->where('barang_promo.promo_id', $promoId)
                          ->get();   
    }

    public function deleteByPromoId($promo_id){
        BarangPromo::where('promo_id', $promo_id)->forceDelete();
    }
}

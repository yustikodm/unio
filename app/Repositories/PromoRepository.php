<?php

namespace App\Repositories;

use App\Models\Promo;
use App\Models\Stok;
use App\Models\BarangPromo;
use App\Repositories\BaseRepository;

/**
 * Class PromoRepository
 * @package App\Repositories
 * @version October 21, 2020, 6:01 am UTC
*/

class PromoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'tanggal_mulai',
        'tanggal_berakhir'
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
        return Promo::class;
    }

    public function getPromoDetail($id){
        return Promo::join('barang', 'barang.id', '=', 'promo.barang_id')
                    ->select('barang.nama AS nama_barang', 'promo.*')
                    ->where('promo.id', $id)
                    ->first();
    }

    public function getPromoByBarangId($id){
        return Promo::where('barang_id', $id)
                    ->first();
    } 

    public function checkKetersediaan($idpromo)
    {
        $barang = BarangPromo::where('promo_id', $idpromo)->get();
        $err = [];
        foreach ($barang as $row) {
            $stok = Stok::where('barang_id', $row->barang_id)->first();
            if($stok->stok < $row->jumlah){
                array_push($err, $row->id);
            }
        }
        if(count($err) == 0){
            return true;
        }else{
            return false;
        }
    }
}

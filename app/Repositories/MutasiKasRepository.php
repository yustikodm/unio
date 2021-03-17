<?php

namespace App\Repositories;

use App\Models\MutasiKas;
use App\Repositories\BaseRepository;

/**
 * Class MutasiKasRepository
 * @package App\Repositories
 * @version December 15, 2020, 10:59 am WIB
*/

class MutasiKasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipe',
        'keterangan',
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
        return MutasiKas::class;
    }

    public function getKas($tipe = null,$dateFrom = null, $dateTo = null)
    {
        if($tipe != null && $dateFrom != null && $dateTo != null){
            if($tipe == "Semua"){
                return MutasiKas::whereBetween('created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                                ->get();
            }else{
                return MutasiKas::where("tipe", $tipe)
                            ->whereBetween('created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                            ->get();
            }
        }
    }

    public function getLastKode($kode){
        return MutasiKas::where('kode', 'like', $kode."%")
                ->latest()
                ->first();
    }
}

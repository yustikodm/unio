<?php

namespace App\Repositories;

use App\Models\Voucher;
use App\Repositories\BaseRepository;

/**
 * Class VoucherRepository
 * @package App\Repositories
 * @version November 23, 2020, 9:41 pm WIB
*/

class VoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'kadaluarsa',
        'diskon'
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
        return Voucher::class;
    }

    public function getVoucerByJabatanId($idJabatan)
    {
        $date = date('Y-m-d')." 00:00:00";
        return Voucher::where('kadaluarsa','>=',$date)->where('jabatan_id', $idJabatan)->get();
    }
}

<?php

namespace App\Repositories;

use App\Models\DetailPurchaseOrder;
use App\Repositories\BaseRepository;

/**
 * Class DetailPurchaseOrderRepository
 * @package App\Repositories
 * @version October 27, 2020, 4:37 pm WIB
*/

class DetailPurchaseOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchase_order_id',
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
        return DetailPurchaseOrder::class;
    }
}

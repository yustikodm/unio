<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\BaseRepository;

/**
 * Class CartRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:45 pm WIB
*/

class CartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'entity_id',
        'entity_type',
        'qty',
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
        return Cart::class;
    }

    public function getByUserLogin()
    {
        return $this->model->getByUserLogin();
    }
}

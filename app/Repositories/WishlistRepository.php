<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\BaseRepository;

/**
 * Class WishlistRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:44 pm WIB
*/

class WishlistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'major_id',
        'service_id',
        'user_id',
        'description'
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
        return Wishlist::class;
    }

    public function currentUser()
    {
        return $this->model->currentUser();
    }
}

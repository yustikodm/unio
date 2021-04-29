<?php

namespace App\Repositories;

use App\Models\PointTopup;
use App\Repositories\BaseRepository;

/**
 * Class PointTopupRepository
 * @package App\Repositories
 * @version March 31, 2021, 11:03 am WIB
*/

class PointTopupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return PointTopup::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('payment_proof')) {
            $field = ['payment_proof'];
            $path = 'points/';

            // Helper Upload App\helper.php
            $ouput = upload($input['user_id'], $field, $path);

            $input = array_merge($input, $ouput);
        }

        if (!empty($id)) {
            return $this->update($input, $id);
        } else {
            return $this->create($input);
        }
    }
}

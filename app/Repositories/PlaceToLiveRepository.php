<?php

namespace App\Repositories;

use App\Models\PlaceToLive;
use App\Repositories\BaseRepository;

/**
 * Class PlaceToLiveRepository
 * @package App\Repositories
 * @version April 5, 2021, 9:59 am WIB
*/

class PlaceToLiveRepository extends BaseRepository
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
        return PlaceToLive::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('picture')) {
            $field = ['picture'];
            $path = 'placetolive/';

            // Helper Upload App\helper.php
            $ouput = upload($input['name'], $field, $path);

            $input = array_merge($input, $ouput);
        }

        if (!empty($id)) {
            return $this->update($input, $id);
        } else {
            return $this->create($input);
        }
    }
}

<?php

namespace App\Repositories;

use App\Models\UniversityFacility;
use App\Repositories\BaseRepository;

/**
 * Class UniversityFacilityRepository
 * @package App\Repositories
 * @version April 14, 2021, 3:47 pm WIB
*/

class UniversityFacilityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = ['university_id', 'name', 'description', 'amount', 'picture'];

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
        return UniversityFacility::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('picture')) {
            $field = ['picture'];
            $path = 'facilities/';

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

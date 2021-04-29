<?php

namespace App\Repositories;

use App\Models\University;
use App\Repositories\BaseRepository;

/**
 * Class UniversityRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:01 pm WIB
 */

class UniversityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'state_id',
        'district_id',
        'code',
        'name',
        'description',
        'logo_src',
        'header_src',
        'type',
        'website',
        'email',
        'accreditation',
        'address'
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
        return University::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('logo_src') || request()->hasFile('header_src')) {
            $field = ['logo_src', 'header_src'];
            $path = 'universities/';

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

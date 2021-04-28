<?php

namespace App\Repositories;

use App\Models\UniversityScholarship;
use App\Repositories\BaseRepository;

/**
 * Class UniversityScholarshipRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:03 pm WIB
*/

class UniversityScholarshipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'name',
        'description',
        'organizer',
        'picture',
        'year'
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
        return UniversityScholarship::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('picture')) {
            $field = ['picture'];
            $path = 'scholarships/';

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

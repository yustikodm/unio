<?php

namespace App\Repositories;

use App\Models\Guardian;
use App\Repositories\BaseRepository;

/**
 * Class GuardianRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:44 pm WIB
*/

class GuardianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'guardian_id',
        'username',
        'password',
        'name',
        'picture',
        'birth_date',
        'birth_place',
        'email',
        'nik',
        'religion_id',
        'address',
        'phone'
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
        return Guardian::class;
    }
}

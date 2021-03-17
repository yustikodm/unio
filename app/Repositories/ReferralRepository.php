<?php

namespace App\Repositories;

use App\Models\Referral;
use App\Repositories\BaseRepository;

/**
 * Class ReferralRepository
 * @package App\Repositories
 * @version October 22, 2020, 5:48 pm WIB
*/

class ReferralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'parent_id',
        'child_id'
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
        return Referral::class;
    }
}

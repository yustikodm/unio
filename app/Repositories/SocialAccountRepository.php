<?php

namespace App\Repositories;

use App\Models\SocialAccount;
use App\Repositories\BaseRepository;

/**
 * Class SocialAccountRepository
 * @package App\Repositories
 * @version April 9, 2021, 2:33 pm WIB
*/

class SocialAccountRepository extends BaseRepository
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
        return SocialAccount::class;
    }
}

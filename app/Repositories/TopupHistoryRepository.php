<?php

namespace App\Repositories;

use App\Models\TopupHistory;
use App\Repositories\BaseRepository;
use Xendit\Balance;
use Xendit\Cards;
use Xendit\VirtualAccounts;
use Xendit\Xendit;

/**
 * Class TopupHistoryRepository
 * @package App\Repositories
 * @version April 29, 2021, 9:23 pm WIB
*/

class TopupHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'country_id',
        'package_id',
        'amount',
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
        return TopupHistory::class;
    }

    public function save($input)
    {
        $input['code'] = $input['method'].bin2hex($input['user_id']).time();

        return $this->create($input);
    }
}

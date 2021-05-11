<?php

namespace App\Repositories;

use App\Models\Biodata;
use App\Repositories\BaseRepository;

/**
 * Class BiodataRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:43 am WIB
*/

class BiodataRepository extends BaseRepository
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
        return Biodata::class;
    }

    public function findByUser($user_id)
    {
        return Biodata::where("user_id",$user_id)->first();
    }

    public function createOrUpdate($userId, $input)
    {
        $exist = $this->findByUser($userId);

        // return ;

        $biodata = [
            'fullname' => $input['name'],
            'address' => $input['address'] ?? '',
            'gender' => $input['gender'] ?? '',
            'picture' => $input['picture'] ?? '',
            'school_origin' => $input['school_origin'] ?? '',
            'graduation_year' => $input['graduation_year'] ?? '',
            'birth_place' => $input['birth_place'] ?? '',
            'birth_date' => date('Y-m-d', strtotime($input['birth_date'])) ?? '',
            'identity_number' => $input['identity_number'] ?? '',
            'religion_id' => $input['religion_id'] ?? '',
        ];

        $input['fullname'] = $input['name'];
        $input['birth_date'] = date('Y-m-d', strtotime($input['birth_date']));
            
        if ($exist) {            
            return $this->update($input, $exist->id);
        }else{
            return $this->create(array_merge($biodata, ['user_id' => $userId]));
        }        
    }
}

<?php

namespace App\Repositories;

use App\Models\MasterMajor;
use App\Models\UniversityMajor;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class UniversityMajorRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:02 pm WIB
*/

class UniversityMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'faculty_id',
        'name',
        'level',
        'accreditation',
        'description'
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
        return UniversityMajor::class;
    }

    public function store($input)
    {
        try {
            $master = MasterMajor::where('name', $input['name'])->first();

            if (!$master) {
              $master = MasterMajor::create([
                'name' => $input['name'],
                ]);
            }
            
            $major = UniversityMajor::create(array_merge($input,[
              'master_id' => $master->id
            ]));
        } catch (Exception $e) {
          throw new BadRequestHttpException($e->getMessage());
        }

        return $major;
    }

    public function update($id, $input)
    {
        $major = $this->findOrFail($id);

        try {
            $master = MasterMajor::where('name', $input['name'])->first();

            if (!$master) {
              $master = MasterMajor::create([
                'name' => $input['name'],
                ]);
            }
            
            $major = $major->update(array_merge($input,[
              'master_id' => $master->id
            ]));
        } catch (Exception $e) {
          throw new BadRequestHttpException($e->getMessage());
        }

        return $major;
    }
}

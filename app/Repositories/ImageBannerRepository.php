<?php

namespace App\Repositories;

use App\Models\ImageBanner;
use App\Repositories\BaseRepository;

/**
 * Class ImageBannerRepository
 * @package App\Repositories
 * @version May 31, 2021, 5:59 pm WIB
*/

class ImageBannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'src'
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
        return ImageBanner::class;
    }
}

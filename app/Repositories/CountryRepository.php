<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 * @version March 3, 2021, 3:00 pm WIB
 */

class CountryRepository extends BaseRepository
{
  /**
   * @var array
   */
  protected $fieldSearchable = ['code', 'name', 'currency_code', 'currency_name'];

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
    return Country::class;
  }
}

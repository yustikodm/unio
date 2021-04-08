<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

// use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App\Models
 * @version October 19, 2020, 3:05 pm UTC
 *
 * @property \App\Models\ModelHasPermission $modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property string $name
 * @property string $guard_name
 */
class Permission extends SpatiePermission
{
  public $table = 'permissions';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  public $fillable = ['name', 'guard_name'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'guard_name' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'name' => 'required|string|max:255',
    'guard_name' => 'required|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable'
  ];

  public static function defaultPermissions()
  {
    return [
      'dashboard.index',

      'roles.index',
      'roles.create',
      'roles.store',
      'roles.edit',
      'roles.update',
      'roles.destroy',
      'roles.show',
      
      'permissions.index',
      'permissions.create',
      'permissions.store',
      'permissions.edit',
      'permissions.update',
      'permissions.destroy',
      'permissions.show',
      
      'users.index',
      'users.create',
      'users.store',
      'users.edit',
      'users.update',
      'users.destroy',
      'users.show',
      'users.profile',

      'families.index',
      'families.show',
      'families.create',
      'families.store',
      'families.edit',
      'families.update',
      'families.destroy',
      
      'biodata.index',
      'biodata.show',
      'biodata.store',
      'biodata.edit',
      'biodata.update',
      'biodata.destroy',

      'wishlists.index',
      'wishlists.show',
      'wishlists.create',
      'wishlists.store',
      'wishlists.edit',
      'wishlists.update',
      'wishlists.destroy',

      'countries.index',
      'countries.show',
      'countries.create',
      'countries.store',
      'countries.edit',
      'countries.update',
      'countries.destroy',
      
      'states.index',
      'states.show',
      'states.create',
      'states.store',
      'states.edit',
      'states.update',
      'states.destroy',
      
      'districts.index',
      'districts.show',
      'districts.create',
      'districts.store',
      'districts.edit',
      'districts.update',
      'districts.destroy',
      
      'religions.index',
      'religions.show',
      'religions.create',
      'religions.store',
      'religions.edit',
      'religions.update',
      'religions.destroy',

      'questionnaires.index',
      'questionnaires.show',
      'questionnaires.create',
      'questionnaires.store',
      'questionnaires.edit',
      'questionnaires.update',
      'questionnaires.destroy',
      
      'questionnaire-answers.index',
      'questionnaire-answers.show',
      'questionnaire-answers.create',
      'questionnaire-answers.store',
      'questionnaire-answers.edit',
      'questionnaire-answers.update',
      'questionnaire-answers.destroy',
      
      'universities.index',
      'universities.show',
      'universities.create',
      'universities.store',
      'universities.edit',
      'universities.update',
      'universities.destroy',
      
      'university-fees.index',
      'university-fees.show',
      'university-fees.create',
      'university-fees.store',
      'university-fees.edit',
      'university-fees.update',
      'university-fees.destroy',
      
      'university-faculties.index',
      'university-faculties.show',
      'university-faculties.create',
      'university-faculties.store',
      'university-faculties.edit',
      'university-faculties.update',
      'university-faculties.destroy',
      
      'university-majors.index',
      'university-majors.show',
      'university-majors.create',
      'university-majors.store',
      'university-majors.edit',
      'university-majors.update',
      'university-majors.destroy',
      
      'university-requirements.index',
      'university-requirements.show',
      'university-requirements.create',
      'university-requirements.store',
      'university-requirements.edit',
      'university-requirements.update',
      'university-requirements.destroy',
      
      'university-scholarships.index',
      'university-scholarships.show',
      'university-scholarships.create',
      'university-scholarships.store',
      'university-scholarships.edit',
      'university-scholarships.update',
      'university-scholarships.destroy',
      
      'vendors.index',
      'vendors.show',
      'vendors.create',
      'vendors.store',
      'vendors.edit',
      'vendors.update',
      'vendors.destroy',
      
      'vendor-categories.index',
      'vendor-categories.show',
      'vendor-categories.create',
      'vendor-categories.store',
      'vendor-categories.edit',
      'vendor-categories.update',
      'vendor-categories.destroy',
      
      'vendor-employees.index',
      'vendor-employees.show',
      'vendor-employees.create',
      'vendor-employees.store',
      'vendor-employees.edit',
      'vendor-employees.update',
      'vendor-employees.destroy',
      
      'vendor-services.index',
      'vendor-services.show',
      'vendor-services.create',
      'vendor-services.store',
      'vendor-services.edit',
      'vendor-services.update',
      'vendor-services.destroy',
      
      'carts.index',
      'carts.show',
      'carts.create',
      'carts.store',
      'carts.edit',
      'carts.update',
      'carts.destroy',
      
      'articles.index',
      'articles.show',
      'articles.create',
      'articles.store',
      'articles.edit',
      'articles.update',
      'articles.destroy',
      
      'place-to-live.index',
      'place-to-live.show',
      'place-to-live.create',
      'place-to-live.store',
      'place-to-live.edit',
      'place-to-live.update',
      'place-to-live.destroy',
      
      'pricing-points.index',
      'pricing-points.show',
      'pricing-points.create',
      'pricing-points.store',
      'pricing-points.edit',
      'pricing-points.update',
      'pricing-points.destroy',
      
      'point-transactions.index',
      'point-transactions.show',
      'point-transactions.create',
      'point-transactions.store',
      'point-transactions.edit',
      'point-transactions.update',
      'point-transactions.destroy',
      
      'point-topup.index',
      'point-topup.show',
      'point-topup.create',
      'point-topup.store',
      'point-topup.edit',
      'point-topup.update',
      'point-topup.destroy',

      'point-logs.index',
    ];
  }
}

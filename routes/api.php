<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthAPIController@register');

Route::post('login', 'AuthAPIController@login');

Route::get('search', 'GlobalSearchAPIController@search');

Route::group(['middleware' => ['auth:api']], function () {
  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
  });

  Route::get('permissions/role-has-permission', 'PermissionAPIController@roleHasPermission');

  Route::get('permissions/refresh-permissions', 'PermissionAPIController@refreshPermissions');

  Route::post('permissions/give-permission-to-role', 'PermissionAPIController@givePermissionToRole');

  Route::post('permissions/revoke-permission-to-role', 'PermissionAPIController@revokePermissionToRole');

  Route::resource('roles', 'RoleAPIController');

  Route::resource('permissions', 'PermissionAPIController');

  Route::resource('boarding_houses', 'BoardingHouseAPIController');

  Route::resource('articles', 'ArticleAPIController');

  Route::resource('countries', 'CountryAPIController');

  Route::resource('states', 'StateAPIController');

  Route::resource('districts', 'DistrictAPIController');

  Route::resource('currencies', 'CurrencyAPIController');

  Route::resource('religions', 'ReligionAPIController');

  Route::resource('questionnaires', 'QuestionnaireAPIController');

  Route::resource('questionnaire_answers', 'QuestionnaireAnswerAPIController');

  Route::resource('universities', 'UniversityAPIController');

  Route::resource('university_fees', 'UniversityFeeAPIController');

  Route::resource('university_majors', 'UniversityMajorAPIController');

  Route::resource('university_requirements', 'UniversityRequirementAPIController');

  Route::resource('university_scholarships', 'UniversityScholarshipAPIController');

  Route::resource('university_faculties', 'UniversityFacultiesAPIController');

  Route::resource('vendors', 'VendorAPIController');

  Route::resource('vendor_services', 'VendorServiceAPIController');

  Route::resource('vendor_employees', 'VendorEmployeeAPIController');

  Route::resource('vendor_categories', 'VendorCategoryAPIController');

  Route::resource('students', 'StudentAPIController');

  Route::resource('guardians', 'GuardianAPIController');

  Route::resource('wishlists', 'WishlistAPIController');

  Route::resource('carts', 'CartAPIController');

  Route::get('users/profile', 'UserAPIConctroller@profile')->middleware('auth:api');

  Route::get('users/show/{id}', 'UserAPIConctroller@show')->middleware('auth:api');
});

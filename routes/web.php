<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('dashboard');
});

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::resource('countries', 'CountryController');

  Route::resource('users', 'UserController');

  Route::get('profile', 'UserController@editProfile');

  Route::post('update-profile', 'UserController@updateProfile');

  Route::resource('roles', 'RoleController');

  Route::resource('permissions', 'PermissionController');

  Route::get('permissions/role-has-permission', 'PermissionController@roleHasPermission');

  Route::get('permissions/refresh-permissions', 'PermissionController@refreshPermissions');

  Route::post('permissions/give-permission-to-role', 'PermissionController@givePermissionToRole');

  Route::post('permissions/revoke-permission-to-role', 'PermissionController@revokePermissionToRole');

  Route::resource('states', 'StateController');

  Route::resource('districts', 'DistrictController');

  Route::resource('religions', 'ReligionController');

  Route::resource('questionnaires', 'QuestionnaireController');

  Route::resource('questionnaire-answers', 'QuestionnaireAnswerController');

  Route::resource('universities', 'UniversityController');

  Route::resource('university-fees', 'UniversityFeeController');

  Route::resource('university-faculties', 'UniversityFacultiesController');

  Route::resource('university-majors', 'UniversityMajorController');

  Route::resource('university-requirements', 'UniversityRequirementController');

  Route::resource('university-scholarships', 'UniversityScholarshipController');

  Route::resource('vendors', 'VendorController');

  Route::resource('vendor-services', 'VendorServiceController');

  Route::resource('vendor-employees', 'VendorEmployeeController');

  Route::resource('vendor-categories', 'VendorCategoryController');

  Route::resource('students', 'StudentController');

  Route::resource('wishlists', 'WishlistController');

  Route::resource('carts', 'CartController');

  Route::resource('articles', 'ArticleController');

  Route::resource('boarding-houses', 'BoardingHouseController');

  Route::resource('families', 'FamilyController');

  Route::resource('biodata', 'BiodataController');

  Route::resource('pricing-points', 'PricingPointController')->only(['store', 'edit', 'update', 'index']);

  Route::resource('point-transactions', 'PointTransactionController');

  Route::resource('point-topup', 'PointTopupController');

  Route::resource('place-to-live', 'PlaceToLiveController');

  Route::resource('point-logs', 'PointLogController')->only('index', 'store');
});

Route::get('coba', 'TestController@index');

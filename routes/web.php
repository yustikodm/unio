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

Route::post('/cobaPrinter', 'HomeController@cobaPrinter')->name('cobaPrinter');

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

  Route::resource('questionnaireAnswers', 'QuestionnaireAnswerController');

  Route::resource('universities', 'UniversityController');

  Route::resource('universityFees', 'UniversityFeeController');

  Route::resource('universityMajors', 'UniversityMajorController');

  Route::resource('universityRequirements', 'UniversityRequirementController');

  Route::resource('universityScholarships', 'UniversityScholarshipController');

  Route::resource('universityFaculties', 'UniversityFacultiesController');

  Route::resource('vendors', 'VendorController');

  Route::resource('vendorServices', 'VendorServiceController');

  Route::resource('vendorEmployees', 'VendorEmployeeController');

  Route::resource('vendorCategories', 'VendorCategoryController');

  Route::resource('students', 'StudentController');

  Route::resource('wishlists', 'WishlistController');

  Route::resource('carts', 'CartController');

  Route::resource('articles', 'ArticleController');
  
  Route::resource('boardingHouses', 'BoardingHouseController');
});


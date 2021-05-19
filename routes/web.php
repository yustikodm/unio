<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('auth.provider');

Route::get('auth/{provider}/callback', 'Auth\LoginController@responseProviderCallback')->name('auth.callback');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  
  Route::resource('countries', 'CountryController');

  Route::get('users/profile', 'UserController@profile')->name('users.profile');
  
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

  Route::resource('questionnaires', 'QuestionnaireController');

  Route::resource('questionnaire-answers', 'QuestionnaireAnswerController');

  Route::resource('universities', 'UniversityController');

  Route::resource('university-fees', 'UniversityFeeController');

  Route::resource('university-faculties', 'UniversityFacultiesController');
  
  Route::resource('university-facilities', 'UniversityFacilitiesController');

  Route::resource('master-majors', 'MasterMajorController')->only(['index', 'store', 'update', 'show']);

  Route::resource('university-majors', 'UniversityMajorController');

  Route::resource('university-requirements', 'UniversityRequirementController');

  Route::resource('university-scholarships', 'UniversityScholarshipController');

  Route::resource('vendors', 'VendorController');

  Route::resource('vendor-services', 'VendorServiceController');

  Route::resource('vendor-employees', 'VendorEmployeeController');

  Route::resource('vendor-categories', 'VendorCategoryController');

  Route::resource('wishlists', 'WishlistController')->except(['create', 'edit']);

  Route::get('carts/checkout', 'CartController@checkout')->name('carts.checkout');

  Route::get('carts/current', 'CartController@current')->name('carts.current');

  Route::resource('carts', 'CartController')->except(['create', 'edit']);

  Route::resource('articles', 'ArticleController');

  Route::resource('families', 'FamilyController');

  Route::resource('biodata', 'BiodataController');

  Route::resource('point-pricings', 'PointPricingsController')->only('index', 'store');

  Route::resource('transactions', 'TransactionController');

  Route::resource('topup-history', 'TopupHistoryController');
  
  Route::resource('topup-packages', 'TopupPackageController');

  Route::resource('place-to-live', 'PlaceToLiveController');

  Route::resource('point-logs', 'PointLogController')->only('index', 'store');  
  
});

Route::post('transaction-refund/accept/{id}', 'TransactionController@acceptRefund');

Route::post('transaction-refund/reject/{id}', 'TransactionController@rejectRefund');

Route::get('coba', 'TestController@index');

Route::resource('topupPackages', 'TopupPackageController');



Route::resource('review', 'ReviewController');

Route::resource('majorPrediction', 'MajorPredictionController');

Route::resource('reviewMajors', 'ReviewMajorsController');

Route::resource('questionnaireImage', 'QuestionnaireImageController');
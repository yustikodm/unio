<?php

use App\Repositories\XenditRepository;
use Illuminate\Support\Facades\Route;

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

  Route::get('logout', 'AuthAPIController@logout');

  // Route::get('/user', function (Request $request) {
  //   return $request->user();
  // });

  Route::get('permissions/role-has-permission', 'PermissionAPIController@roleHasPermission');

  Route::get('permissions/refresh-permissions', 'PermissionAPIController@refreshPermissions');

  Route::post('permissions/give-permission-to-role', 'PermissionAPIController@givePermissionToRole');

  Route::post('permissions/revoke-permission-to-role', 'PermissionAPIController@revokePermissionToRole');

  Route::resource('roles', 'RoleAPIController');

  Route::resource('permissions', 'PermissionAPIController');

  Route::get('users/profile', 'UserAPIConctroller@profile');

  Route::put('users/change-password', 'UserAPIConctroller@changePassword');

  Route::apiResource('users', 'UserAPIController');

  Route::get('families/list/{id}', 'FamilyAPIController@familyList');
  
  Route::apiResource('families', 'FamilyAPIController');
  
  Route::resource('biodata', 'BiodataAPIController')->except(['index', 'create', 'edit']);
  
  Route::get('wishlists/current', 'WishlistAPIController@current');
  
  Route::resource('wishlists', 'WishlistAPIController')->only(['index', 'destroy', 'store']);
  
  Route::get('carts/current', 'CartAPIController@current');

  Route::resource('carts', 'CartAPIController');

  Route::post('checkout', 'CheckoutAPIController@checkout');
  
  Route::get('point/families/{userId}', 'PointLogAPIController@familyPoint');

  Route::resource('points', 'PointLogAPIController')->only(['index', 'store', 'show']);
  
  Route::resource('topup-history', 'TopupHistoryAPIController');
  
  Route::get('xendit/list-va', 'XenditAPIController@getListVA');
  
  Route::get('xendit/transaction/{method}/{id}', 'XenditAPIController@getTransaction');

  Route::resource('transaction', 'TransactionAPIController');

  Route::post('transaction-refund/{id}', 'TransactionAPIController@refund');

  Route::post('transaction-refund/accept/{id}', 'TransactionAPIController@acceptRefund');

  Route::post('transaction-refund/reject/{id}', 'TransactionAPIController@rejectRefund');
  
  Route::get('transaction-invoice/{id}', 'CheckoutAPIController@cetakInvoicePdf');
  
});


Route::resource('articles', 'ArticleAPIController');

Route::resource('countries', 'CountryAPIController');

Route::resource('states', 'StateAPIController');

Route::resource('districts', 'DistrictAPIController');

Route::resource('questionnaires', 'QuestionnaireAPIController');

Route::resource('questionnaire-answers', 'QuestionnaireAnswerAPIController');

Route::resource('universities', 'UniversityAPIController');

Route::resource('university-fees', 'UniversityFeeAPIController');

Route::resource('university-majors', 'UniversityMajorAPIController');

Route::resource('master-majors', 'MasterMajorAPIController');

Route::resource('university-requirements', 'UniversityRequirementAPIController');

Route::resource('university-scholarships', 'UniversityScholarshipAPIController');

Route::resource('university-faculties', 'UniversityFacultiesAPIController');

Route::resource('university-facilities', 'UniversityFacilitiesAPIController');

Route::resource('vendors', 'VendorAPIController');

Route::resource('vendor-services', 'VendorServiceAPIController');

Route::resource('vendor-employees', 'VendorEmployeeAPIController');

Route::resource('vendor-categories', 'VendorCategoryAPIController');

Route::resource('place-to-lives', 'PlaceToLiveAPIController');

Route::get('xendit/va/list', 'XenditAPITESTController@getListVa');

Route::post('xendit/va/invoice', 'XenditAPITESTController@createVa');

Route::post('xendit/va/callback', 'XenditAPITESTController@callbackVa');
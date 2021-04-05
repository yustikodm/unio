<?php

namespace App\Providers;

use App\Models\District;
use App\Models\Questionnaire;
use App\Models\State;
use App\Models\Country;

use App\Models\Mitra;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityMajor;
use App\Models\Vendor;
use App\Models\VendorCategory;
use App\User;
use App\Models\Religion;
use Spatie\Permission\Models\Role;

use Illuminate\Support\ServiceProvider;

use View;

class ViewServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // Vendor Service
    View::composer(['vendor_services.fields'], function ($view) {
      $vendorItems = Vendor::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $vendorItems);
    });

    // Vendor Employee
    View::composer(['vendor_employees.fields'], function ($view) {
      $vendorItems = Vendor::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $vendorItems);
    });

    // Vendor
    View::composer(['vendors.fields'], function ($view) {
      $categoryItems = VendorCategory::pluck('name', 'id')->toArray();
      $view->with('categoryItems', $categoryItems);
    });

    // University Scholarship
    View::composer(['university_scholarships.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Scholarship
    View::composer(['university_scholarships.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Requirement
    View::composer(['university_requirements.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });
    View::composer(['university_requirements.fields'], function ($view) {
      $majorItems = UniversityMajor::pluck('name', 'id')->toArray();
      $view->with('majorItems', $majorItems);
    });

    // University Majors
    View::composer(['university_majors.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    View::composer(['university_majors.fields'], function ($view) {
      $facultyItems = UniversityFaculties::pluck('name', 'id')->toArray();
      $view->with('facultyItems', $facultyItems);
    });

    // University Faculty
    View::composer(['university_faculties.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University
    View::composer(['universities.fields'], function ($view) {
      $districtItems = District::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });
    View::composer(['universities.fields'], function ($view) {
      $stateItems = State::pluck('name', 'id')->toArray();
      $view->with('stateItems', $stateItems);
    });
    View::composer(['universities.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // questionnaireAnswer
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $questionnaireItems = Questionnaire::pluck('question', 'id')->toArray();
      $view->with('questionnaireItems', $questionnaireItems);
    });

    // questionnaireAnswer - user
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // State
    View::composer(['districts.fields'], function ($view) {
      $districtItems = State::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });

    // State
    View::composer(['states.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Users
    View::composer(['users.fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    View::composer(['users.edit_fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    // Poin
    View::composer(['poin.fields'], function ($view) {
      $mitraItems = Mitra::leftJoin('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
        ->select('mitra.*', 'pelanggan.nama')->pluck('nama', 'id')->toArray();
      $view->with('mitraItems', $mitraItems);
    });

    // families - user (parent & child)
    View::composer(['families.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // biodata - user id
    View::composer(['biodata.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // biodata religion list
    View::composer(['biodata.fields'], function ($view) {
      $religionItems = Religion::pluck('name', 'id')->toArray();
      $view->with('religionItems', $religionItems);
    });

    // place to live
    View::composer(['place_to_lives.fields'], function ($view) {
      $districtItems = District::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });
    View::composer(['place_to_lives.fields'], function ($view) {
      $stateItems = State::pluck('name', 'id')->toArray();
      $view->with('stateItems', $stateItems);
    });
    View::composer(['place_to_lives.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });
  }
}

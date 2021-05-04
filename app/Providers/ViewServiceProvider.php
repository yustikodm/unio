<?php

namespace App\Providers;

use App\Models\District;
use App\Models\Questionnaire;
use App\Models\State;
use App\Models\Country;
use App\Models\TopupPackage;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityMajor;
use App\Models\Vendor;
use App\Models\VendorCategory;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use View;

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
    // Country Region
    View::composer(['countries.fields'], function ($view) {
      $region = Country::pluck('region', 'region')->toArray();
      $view->with('region', $region);
    });

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

    // Vendor - List District, State, Country
    View::composer(['vendors.fields'], function ($view) {
      $districtItems = District::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });
    View::composer(['vendors.fields'], function ($view) {
      $stateItems = State::pluck('name', 'id')->toArray();
      $view->with('stateItems', $stateItems);
    });
    View::composer(['vendors.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // University Scholarship - List Universities
    View::composer(['university_facilities.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Scholarship - List Universities
    View::composer(['university_scholarships.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Requirement - List Universities
    View::composer(['university_requirements.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Requirement - List University Major
    View::composer(['university_requirements.fields'], function ($view) {
      $majorItems = UniversityMajor::pluck('name', 'id')->toArray();
      $view->with('majorItems', $majorItems);
    });

    // University Majors - List Universities
    View::composer(['university_majors.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Major - List University Faculty
    View::composer(['university_majors.fields'], function ($view) {
      $facultyItems = UniversityFaculties::pluck('name', 'id')->toArray();
      $view->with('facultyItems', $facultyItems);
    });

    // University Faculty - List Universities
    View::composer(['university_faculties.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Fee - List Universities
    View::composer(['university_fees.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });
    View::composer(['university_fees.fields'], function ($view) {
      $facultyItems = UniversityFaculties::pluck('name', 'id')->toArray();
      $view->with('facultyItems', $facultyItems);
    });
    View::composer(['university_fees.fields'], function ($view) {
      $majorItems = UniversityMajor::pluck('name', 'id')->toArray();
      $view->with('majorItems', $majorItems);
    });

    // University - List District, State, Country
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

    // Questionnaire Answer - List Questionnaire
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $questionnaireItems = Questionnaire::pluck('question', 'id')->toArray();
      $view->with('questionnaireItems', $questionnaireItems);
    });

    // Questionnaire Answer - List User
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // District - State List
    View::composer(['districts.fields'], function ($view) {
      $districtItems = State::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });

    // State - Country List
    View::composer(['states.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Users - Create (Select Role User)
    View::composer(['users.fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    // Users - Edit (Select & Update Role User)
    View::composer(['users.edit_fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    // families - List User (parent & child)
    View::composer(['families.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });
    View::composer(['families.fields'], function ($view) {
      $relationItems = ['parent' => 'Parent', 'child' => 'Child'];
      $view->with('relationItems', $relationItems);
    });
    
    // Point Top Up - List User
    View::composer(['topup_history.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // Point Top Up - List Countries
    View::composer(['topup_history.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Point Top Up - List Packages
    View::composer(['topup_history.fields'], function ($view) {
      $packageItems = TopupPackage::pluck('name', 'id')->toArray();
      $view->with('packageItems', $packageItems);
    });

    // Biodata - User List
    View::composer(['biodata.fields'], function ($view) {
      $userItems = User::getNotExistBiodata()->pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // Place to live - List District, State, Country
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

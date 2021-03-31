<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Models\PlaceToLive;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityMajor;
use App\Models\UniversityScholarship;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;

class GlobalSearchAPIController extends AppBaseController
{
  // // private $universityMajorRepository;
  // private $countryRepository;

  // // public function __construct(UniversityMajorRepository $universityMajorRepo, CountryRepository $countryRepo)
  // public function __construct(CountryRepository $countryRepo)
  // {
  //   // {
  //   //   $this->universityMajorRepository = $universityMajorRepo;

  //   $this->countryRepository = $countryRepo;
  // }

  public function search(Request $request)
  {
    /** 
     * API
     * global search 
     * - searching based 3 param
     * - kategori type
     * 1. universities => major country state district, 
     * 2. [DEFAULT] major => universitas country state distric, 
     * 3. faculty => major universitas country state district, 
     * 4. place to live (boarding house) => country state district, 
     * 5. vendor => category country state district, 
     * 6. vendor services vendor country state district, 
     * 7. scholarship => university country state district
     */

    switch ($request->keyword) {
      case 'countries':
        $country = Country::apiSearch($request->name, null, null);

        return $this->sendResponse($country, 'Country retrieved successfully');
        break;

      case 'universities':
        $university = University::apiSearch($request->name);

        return $this->sendResponse($university, 'University retrieved successfully');
        break;

      case 'faculties':
        $universityFaculties = UniversityFaculties::apiSearch($request->name);

        return $this->sendResponse($universityFaculties, 'University Faculties retrieved successfully');
        break;

      case 'placetolive':
        $placeToLive = PlaceToLive::apiSearch($request->name);

        return $this->sendResponse($placeToLive, 'Place T oLive retrieved successfully');
        break;

      case 'vendor':
        $vendor = Vendor::apiSearch($request->name);

        return $this->sendResponse($vendor, 'Vendor retrieved successfully');
        break;

      case 'vendorservices':
        $vendorService = VendorService::apiSearch($request->name);

        return $this->sendResponse($vendorService, 'Vendor Service retrieved successfully');
        break;

      case 'scholarship':
        $universityScholarship = UniversityScholarship::apiSearch($request->name);

        return $this->sendResponse($universityScholarship, 'University Scholarship retrieved successfully');
        break;

      default: // major
        $universityMajor = UniversityMajor::apiSearch($request->name);

        return $this->sendResponse($universityMajor, 'University Major retrieved successfully');
        break;
    }
  }
}

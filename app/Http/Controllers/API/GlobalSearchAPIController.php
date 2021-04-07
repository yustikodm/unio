<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PlaceToLiveResource;
use App\Http\Resources\SearchFacutltiesResource;
use App\Http\Resources\SearchUniversitiesResource;
use App\Http\Resources\UniversityMajorResource;
use App\Http\Resources\UniversityScholarshipResource;
use App\Http\Resources\VendorResource;
use App\Http\Resources\VendorServiceResource;
use App\Models\PlaceToLive;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityMajor;
use App\Models\UniversityScholarship;
use App\Models\Vendor;
use App\Models\VendorService;
use Illuminate\Http\Request;

class GlobalSearchAPIController extends AppBaseController
{

  public function search(Request $request)
  {
    /** 
     * API
     * Global Search API
     * 1. universities => major country state district, 
     * 2. [DEFAULT] major => universitas country state distric, 
     * 3. faculties => major universitas country state district, 
     * 4. placetolive (boarding house) => country state district, 
     * 5. vendors => category country state district, 
     * 6. vendorservices => vendor country state district, 
     * 7. scholarship => university country state district
     */

    switch ($request->keyword) {
      case 'universities':
        $university = University::apiSearch($request->name, $request->major, $request->country, $request->state, $request->district);

        return $this->sendResponse(SearchUniversitiesResource::collection($university), 'Universities retrieved successfully');
        break;

      case 'faculties':
        $universityFaculties = UniversityFaculties::apiSearch($request->name, $request->major, $request->university, $request->country, $request->state, $request->district);
        // return $universityFaculties;
        return $this->sendResponse(SearchFacutltiesResource::collection($universityFaculties), 'University Faculties retrieved successfully');
        break;

      case 'placetolive':
        $placeToLive = PlaceToLive::apiSearch($request->name);

        return $this->sendResponse(PlaceToLiveResource::collection($placeToLive), 'Place To Live retrieved successfully');
        break;

      case 'vendors':
        $vendor = Vendor::apiSearch($request->name);

        return $this->sendResponse(VendorResource::collection($vendor), 'Vendor retrieved successfully');
        break;

      case 'vendorservices':
        $vendorService = VendorService::apiSearch($request->name);

        return $this->sendResponse(VendorServiceResource::collection($vendorService), 'Vendor Service retrieved successfully');
        break;

      case 'scholarship':
        $universityScholarship = UniversityScholarship::apiSearch($request->name);

        return $this->sendResponse(UniversityScholarshipResource::collection($universityScholarship), 'University Scholarship retrieved successfully');
        break;

      default: // major
        $universityMajors = UniversityMajor::apiSearch($request->name);

        return $this->sendResponse(UniversityMajorResource::collection($universityMajors), 'University Majors retrieved successfully');
        break;
    }
  }
}

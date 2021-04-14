<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PlaceToLiveResource;
use App\Http\Resources\SearchFacutltiesResource;
use App\Http\Resources\SearchUniversitiesResource;
use App\Http\Resources\UniversityMajorResource;
use App\Http\Resources\UniversityResource;
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
      case 'universities': // DONE
        $university = University::apiSearch($request->name, $request->major, $request->country, $request->state, $request->district);

        return UniversityResource::collection($university->paginate(15))->toResponse(15);
        break;

      case 'faculties': // DONE
        $universityFaculties = UniversityFaculties::apiSearch($request->name, $request->major, $request->university, $request->country, $request->state, $request->district);

        return SearchFacutltiesResource::collection($universityFaculties->paginate(15))->toResponse(15);
        break;

      case 'placetolive': // DONE
        $placeToLive = PlaceToLive::apiSearch($request->name, $request->country, $request->state, $request->district);

        return PlaceToLiveResource::collection($placeToLive->paginate(15))->toResponse(15);
        break;

      case 'vendors': // DONE
        $vendor = Vendor::apiSearch($request->name, $request->category, $request->country, $request->state, $request->district);

        return VendorResource::collection($vendor->paginate(15))->toResponse(15);
        break;

      case 'vendorservices': // DONE
        $vendorService = VendorService::apiSearch($request->name, $request->vendor, $request->country, $request->state, $request->district);

        return VendorServiceResource::collection($vendorService->paginate(15))->toResponse(15);
        break;

      case 'scholarship':
        $universityScholarship = UniversityScholarship::apiSearch($request->name, $request->university, $request->country, $request->state, $request->district);

        return UniversityScholarshipResource::collection($universityScholarship->paginate(15))->toResponse(15);
        break;

      default: // University Major // DONE
        $universityMajors = UniversityMajor::apiSearch($request->name, $request->university, $request->country, $request->state, $request->district);

        return UniversityMajorResource::collection($universityMajors->paginate(15))->toResponse(15);
        break;
    }
  }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorAPIRequest;
use App\Http\Requests\API\UpdateVendorAPIRequest;
use App\Models\Vendor;
use App\Repositories\VendorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VendorResource;
use Response;
use Illuminate\Support\Facades\DB;

/**
 * Class VendorController
 * @package App\Http\Controllers\API
 */

class VendorAPIController extends AppBaseController
{
    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     * GET|HEAD /vendors
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vendors = Vendor::query();

        if($request->name){
            $vendors->where('name','LIKE', "%$request->name%");
        }

        if($request->country){
            $vendors->where('country_id', $request->country);
        }

        if($request->state){
            $vendors->where('state_id', $request->state);
        }

       if($request->user_id){
            $user_id = $request->user_id;
            $vendors->leftJoin('wishlists', function ($join) use ($user_id) {                            
                            $join->on("wishlists.entity_id" , '=', DB::raw("vendors.id AND wishlists.entity_type = 'vendors' AND wishlists.user_id = $user_id")); 
                        })->selectRaw("vendors.*, COALESCE(wishlists.id, '0') as is_checked");
        }else{
            $vendors->selectRaw("vendors.*, '0' as is_checked");
        }

        return $this->sendResponse($vendors->paginate(15), 'Vendors retrieved successfully');
    }

    /**
     * Store a newly created Vendor in storage.
     * POST /vendors
     *
     * @param CreateVendorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'vendor_category_id',
            'name',
            'description',
            'picture',
            'email',
            'bank_account_number',
            'website',
            'address',
            'phone'
        ]);

        $vendor = $this->vendorRepository->create($input);

        return $this->sendResponse(new VendorResource($vendor), 'Vendor saved successfully');
    }

    /**
     * Display the specified Vendor.
     * GET|HEAD /vendors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        /** @var Vendor $vendor */
        $vendor = Vendor::query()->where('vendors.id', $id);

       if($request->input('user_id')){
            $user_id = $request->input('user_id');
            $vendor->leftJoin('wishlists', function ($join) use ($user_id) {                            
                            $join->on("wishlists.entity_id" , '=', DB::raw("vendors.id AND wishlists.entity_type = 'vendors' AND wishlists.user_id = $user_id")); 
                        })->selectRaw("vendors.*, COALESCE(wishlists.id, '0') as is_checked");
        }else{
            $vendor->selectRaw("vendors.*, '0' as is_checked");
        }

        $vendor = $vendor->first();

        if (empty($vendor)) {
            return $this->sendError('Vendor not found');
        }

        return $this->sendResponse(new VendorResource($vendor), 'Vendor retrieved successfully');
    }

    /**
     * Update the specified Vendor in storage.
     * PUT/PATCH /vendors/{id}
     *
     * @param int $id
     * @param UpdateVendorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'vendor_category_id',
            'name',
            'description',
            'picture',
            'email',
            'bank_account_number',
            'website',
            'address',
            'phone'
        ]);

        /** @var Vendor $vendor */
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            return $this->sendError('Vendor not found');
        }

        $vendor = $this->vendorRepository->update($input, $id);

        return $this->sendResponse(new VendorResource($vendor), 'Vendor updated successfully');
    }

    /**
     * Remove the specified Vendor from storage.
     * DELETE /vendors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vendor $vendor */
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            return $this->sendError('Vendor not found');
        }

        $vendor->delete();

        return $this->sendSuccess('Vendor deleted successfully');
    }
}

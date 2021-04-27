<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorServiceAPIRequest;
use App\Http\Requests\API\UpdateVendorServiceAPIRequest;
use App\Models\VendorService;
use App\Repositories\VendorServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VendorServiceResource;
use Response;

/**
 * Class VendorServiceController
 * @package App\Http\Controllers\API
 */

class VendorServiceAPIController extends AppBaseController
{
    /** @var  VendorServiceRepository */
    private $vendorServiceRepository;

    public function __construct(VendorServiceRepository $vendorServiceRepo)
    {
        $this->vendorServiceRepository = $vendorServiceRepo;
    }

    /**
     * Display a listing of the VendorService.
     * GET|HEAD /vendorServices
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = [];

        if ($request->vendor_id) {
            $search = array_merge($search, [
                'vendor_id' => $request->vendor_id,    
            ]);
        }

        $vendorServices = $this->vendorServiceRepository->paginate(15, [], $search);

        return $this->sendResponse($vendorServices, 'Vendor Services retrieved successfully');
    }

    /**
     * Store a newly created VendorService in storage.
     * POST /vendorServices
     *
     * @param CreateVendorServiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorServiceAPIRequest $request)
    {
        $input = $request->only([
            'vendor_id',
            'name',
            'description',
            'picture',
            'price'
        ]);

        $vendorService = $this->vendorServiceRepository->create($input);

        return $this->sendResponse(new VendorServiceResource($vendorService), 'Vendor Service saved successfully');
    }

    /**
     * Display the specified VendorService.
     * GET|HEAD /vendorServices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VendorService $vendorService */
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            return $this->sendError('Vendor Service not found');
        }

        return $this->sendResponse(new VendorServiceResource($vendorService), 'Vendor Service retrieved successfully');
    }

    /**
     * Update the specified VendorService in storage.
     * PUT/PATCH /vendorServices/{id}
     *
     * @param int $id
     * @param UpdateVendorServiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorServiceAPIRequest $request)
    {
        $input = $request->only([
            'vendor_id',
            'name',
            'description',
            'picture',
            'price'
        ]);

        /** @var VendorService $vendorService */
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            return $this->sendError('Vendor Service not found');
        }

        $vendorService = $this->vendorServiceRepository->update($input, $id);

        return $this->sendResponse(new VendorServiceResource($vendorService), 'VendorService updated successfully');
    }

    /**
     * Remove the specified VendorService from storage.
     * DELETE /vendorServices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VendorService $vendorService */
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            return $this->sendError('Vendor Service not found');
        }

        $vendorService->delete();

        return $this->sendSuccess('Vendor Service deleted successfully');
    }
}

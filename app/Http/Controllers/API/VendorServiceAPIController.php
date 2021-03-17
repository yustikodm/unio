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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vendorServices = $this->vendorServiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VendorServiceResource::collection($vendorServices), 'Vendor Services retrieved successfully');
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
        $input = $request->all();

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
        $input = $request->all();

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

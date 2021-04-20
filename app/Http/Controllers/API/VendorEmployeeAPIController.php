<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorEmployeeAPIRequest;
use App\Http\Requests\API\UpdateVendorEmployeeAPIRequest;
use App\Models\VendorEmployee;
use App\Repositories\VendorEmployeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VendorEmployeeResource;
use Response;

/**
 * Class VendorEmployeeController
 * @package App\Http\Controllers\API
 */

class VendorEmployeeAPIController extends AppBaseController
{
    /** @var  VendorEmployeeRepository */
    private $vendorEmployeeRepository;

    public function __construct(VendorEmployeeRepository $vendorEmployeeRepo)
    {
        $this->vendorEmployeeRepository = $vendorEmployeeRepo;
    }

    /**
     * Display a listing of the VendorEmployee.
     * GET|HEAD /vendorEmployees
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vendorEmployees = $this->vendorEmployeeRepository->paginate(15, [], ['name' => $request->name]);

        return $this->sendResponse($vendorEmployees, 'Vendor Employees retrieved successfully');
    }

    /**
     * Store a newly created VendorEmployee in storage.
     * POST /vendorEmployees
     *
     * @param CreateVendorEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorEmployeeAPIRequest $request)
    {
        $input = $request->only([
            'vendor_id',
            'name',
            'birthdate',
            'position',
            'phone',
            'email',
            'address',
            'picture',
            'description'
        ]);

        $vendorEmployee = $this->vendorEmployeeRepository->create($input);

        return $this->sendResponse(new VendorEmployeeResource($vendorEmployee), 'Vendor Employee saved successfully');
    }

    /**
     * Display the specified VendorEmployee.
     * GET|HEAD /vendorEmployees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VendorEmployee $vendorEmployee */
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            return $this->sendError('Vendor Employee not found');
        }

        return $this->sendResponse(new VendorEmployeeResource($vendorEmployee), 'Vendor Employee retrieved successfully');
    }

    /**
     * Update the specified VendorEmployee in storage.
     * PUT/PATCH /vendorEmployees/{id}
     *
     * @param int $id
     * @param UpdateVendorEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorEmployeeAPIRequest $request)
    {
        $input = $request->only([
            'vendor_id',
            'name',
            'birthdate',
            'position',
            'phone',
            'email',
            'address',
            'picture',
            'description'
        ]);

        /** @var VendorEmployee $vendorEmployee */
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            return $this->sendError('Vendor Employee not found');
        }

        $vendorEmployee = $this->vendorEmployeeRepository->update($input, $id);

        return $this->sendResponse(new VendorEmployeeResource($vendorEmployee), 'VendorEmployee updated successfully');
    }

    /**
     * Remove the specified VendorEmployee from storage.
     * DELETE /vendorEmployees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VendorEmployee $vendorEmployee */
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            return $this->sendError('Vendor Employee not found');
        }

        $vendorEmployee->delete();

        return $this->sendSuccess('Vendor Employee deleted successfully');
    }
}

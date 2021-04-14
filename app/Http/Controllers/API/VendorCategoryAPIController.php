<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorCategoryAPIRequest;
use App\Http\Requests\API\UpdateVendorCategoryAPIRequest;
use App\Models\VendorCategory;
use App\Repositories\VendorCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VendorCategoryResource;
use Response;

/**
 * Class VendorCategoryController
 * @package App\Http\Controllers\API
 */

class VendorCategoryAPIController extends AppBaseController
{
    /** @var  VendorCategoryRepository */
    private $vendorCategoryRepository;

    public function __construct(VendorCategoryRepository $vendorCategoryRepo)
    {
        $this->vendorCategoryRepository = $vendorCategoryRepo;
    }

    /**
     * Display a listing of the VendorCategory.
     * GET|HEAD /vendorCategories
     *
     * @return Response
     */
    public function index()
    {
        $vendorCategories = $this->vendorCategoryRepository->paginate(15);

        return $this->sendResponse($vendorCategories, 'Vendor Categories retrieved successfully');
    }

    /**
     * Store a newly created VendorCategory in storage.
     * POST /vendorCategories
     *
     * @param CreateVendorCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorCategoryAPIRequest $request)
    {
        $input = $request->only(['name', 'description']);

        $vendorCategory = $this->vendorCategoryRepository->create($input);

        return $this->sendResponse(new VendorCategoryResource($vendorCategory), 'Vendor Category saved successfully');
    }

    /**
     * Display the specified VendorCategory.
     * GET|HEAD /vendorCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VendorCategory $vendorCategory */
        $vendorCategory = $this->vendorCategoryRepository->find($id);

        if (empty($vendorCategory)) {
            return $this->sendError('Vendor Category not found');
        }

        return $this->sendResponse(new VendorCategoryResource($vendorCategory), 'Vendor Category retrieved successfully');
    }

    /**
     * Update the specified VendorCategory in storage.
     * PUT/PATCH /vendorCategories/{id}
     *
     * @param int $id
     * @param UpdateVendorCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorCategoryAPIRequest $request)
    {
        $input = $request->only(['name', 'description']);

        /** @var VendorCategory $vendorCategory */
        $vendorCategory = $this->vendorCategoryRepository->find($id);

        if (empty($vendorCategory)) {
            return $this->sendError('Vendor Category not found');
        }

        $vendorCategory = $this->vendorCategoryRepository->update($input, $id);

        return $this->sendResponse(new VendorCategoryResource($vendorCategory), 'VendorCategory updated successfully');
    }

    /**
     * Remove the specified VendorCategory from storage.
     * DELETE /vendorCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VendorCategory $vendorCategory */
        $vendorCategory = $this->vendorCategoryRepository->find($id);

        if (empty($vendorCategory)) {
            return $this->sendError('Vendor Category not found');
        }

        $vendorCategory->delete();

        return $this->sendSuccess('Vendor Category deleted successfully');
    }
}

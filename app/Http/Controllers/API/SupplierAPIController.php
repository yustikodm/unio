<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSupplierAPIRequest;
use App\Http\Requests\API\UpdateSupplierAPIRequest;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SupplierController
 * @package App\Http\Controllers\API
 */

class SupplierAPIController extends AppBaseController
{
    /** @var  SupplierRepository */
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the Supplier.
     * GET|HEAD /supplier
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $supplier = $this->supplierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($supplier->toArray(), 'Supplier retrieved successfully');
    }

    /**
     * Store a newly created Supplier in storage.
     * POST /supplier
     *
     * @param CreateSupplierAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSupplierAPIRequest $request)
    {
        $input = $request->all();

        $supplier = $this->supplierRepository->create($input);

        return $this->sendResponse($supplier->toArray(), 'Supplier saved successfully');
    }

    /**
     * Display the specified Supplier.
     * GET|HEAD /supplier/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Supplier $supplier */
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            return $this->sendError('Supplier not found');
        }

        return $this->sendResponse($supplier->toArray(), 'Supplier retrieved successfully');
    }

    /**
     * Update the specified Supplier in storage.
     * PUT/PATCH /supplier/{id}
     *
     * @param int $id
     * @param UpdateSupplierAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupplierAPIRequest $request)
    {
        $input = $request->all();

        /** @var Supplier $supplier */
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            return $this->sendError('Supplier not found');
        }

        $supplier = $this->supplierRepository->update($input, $id);

        return $this->sendResponse($supplier->toArray(), 'Supplier updated successfully');
    }

    /**
     * Remove the specified Supplier from storage.
     * DELETE /supplier/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Supplier $supplier */
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            return $this->sendError('Supplier not found');
        }

        $supplier->delete();

        return $this->sendSuccess('Supplier deleted successfully');
    }
}

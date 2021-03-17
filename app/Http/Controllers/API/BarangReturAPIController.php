<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangReturAPIRequest;
use App\Http\Requests\API\UpdateBarangReturAPIRequest;
use App\Models\BarangRetur;
use App\Repositories\BarangReturRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangReturController
 * @package App\Http\Controllers\API
 */

class BarangReturAPIController extends AppBaseController
{
    /** @var  BarangReturRepository */
    private $barangReturRepository;

    public function __construct(BarangReturRepository $barangReturRepo)
    {
        $this->barangReturRepository = $barangReturRepo;
    }

    /**
     * Display a listing of the BarangRetur.
     * GET|HEAD /barangRetur
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangRetur = $this->barangReturRepository->getJoinBarangRetur();

        return $this->sendResponse($barangRetur->toArray(), 'Barang Retur retrieved successfully');
    }

    /**
     * Store a newly created BarangRetur in storage.
     * POST /barangRetur
     *
     * @param CreateBarangReturAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangReturAPIRequest $request)
    {
        $input = $request->all();

        $barangRetur = $this->barangReturRepository->create($input);

        return $this->sendResponse($barangRetur->toArray(), 'Barang Retur saved successfully');
    }

    /**
     * Display the specified BarangRetur.
     * GET|HEAD /barangRetur/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangRetur $barangRetur */
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            return $this->sendError('Barang Retur not found');
        }

        return $this->sendResponse($barangRetur->toArray(), 'Barang Retur retrieved successfully');
    }

    /**
     * Update the specified BarangRetur in storage.
     * PUT/PATCH /barangRetur/{id}
     *
     * @param int $id
     * @param UpdateBarangReturAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangReturAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangRetur $barangRetur */
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            return $this->sendError('Barang Retur not found');
        }

        $barangRetur = $this->barangReturRepository->update($input, $id);

        return $this->sendResponse($barangRetur->toArray(), 'BarangRetur updated successfully');
    }

    /**
     * Remove the specified BarangRetur from storage.
     * DELETE /barangRetur/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangRetur $barangRetur */
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            return $this->sendError('Barang Retur not found');
        }

        $barangRetur->delete();

        return $this->sendSuccess('Barang Retur deleted successfully');
    }

    public function deleteBarangRetur($id){
        $barangTerima = BarangRetur::where('retur_barang_id', $id)->forceDelete();

        return $this->sendSuccess('barang Retur deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangPenerimaanAPIRequest;
use App\Http\Requests\API\UpdateBarangPenerimaanAPIRequest;
use App\Models\BarangPenerimaan;
use App\Repositories\BarangPenerimaanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangPenerimaanController
 * @package App\Http\Controllers\API
 */

class BarangPenerimaanAPIController extends AppBaseController
{
    /** @var  BarangPenerimaanRepository */
    private $barangPenerimaanRepository;

    public function __construct(BarangPenerimaanRepository $barangPenerimaanRepo)
    {
        $this->barangPenerimaanRepository = $barangPenerimaanRepo;
    }

    /**
     * Display a listing of the BarangPenerimaan.
     * GET|HEAD /barangPenerimaan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangPenerimaan = $this->barangPenerimaanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangPenerimaan->toArray(), 'Barang Penerimaan retrieved successfully');
    }

    /**
     * Store a newly created BarangPenerimaan in storage.
     * POST /barangPenerimaan
     *
     * @param CreateBarangPenerimaanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenerimaanAPIRequest $request)
    {
        $input = $request->all();

        $barangPenerimaan = $this->barangPenerimaanRepository->create($input);

        return $this->sendResponse($barangPenerimaan->toArray(), 'Barang Penerimaan saved successfully');
    }

    /**
     * Display the specified BarangPenerimaan.
     * GET|HEAD /barangPenerimaan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangPenerimaan $barangPenerimaan */
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            return $this->sendError('Barang Penerimaan not found');
        }

        return $this->sendResponse($barangPenerimaan->toArray(), 'Barang Penerimaan retrieved successfully');
    }

    /**
     * Update the specified BarangPenerimaan in storage.
     * PUT/PATCH /barangPenerimaan/{id}
     *
     * @param int $id
     * @param UpdateBarangPenerimaanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenerimaanAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangPenerimaan $barangPenerimaan */
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            return $this->sendError('Barang Penerimaan not found');
        }

        $barangPenerimaan = $this->barangPenerimaanRepository->update($input, $id);

        return $this->sendResponse($barangPenerimaan->toArray(), 'BarangPenerimaan updated successfully');
    }

    /**
     * Remove the specified BarangPenerimaan from storage.
     * DELETE /barangPenerimaan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangPenerimaan $barangPenerimaan */
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            return $this->sendError('Barang Penerimaan not found');
        }

        $barangPenerimaan->delete();

        return $this->sendSuccess('Barang Penerimaan deleted successfully');
    }

    public function deleteBarangPenerimaan($id){
        $barangTerima = BarangPenerimaan::where('penerimaan_retur_id', $id)->forceDelete();

        return $this->sendSuccess('barang Penerimaan deleted successfully');
    }
}

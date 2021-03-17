<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangPenjualanAPIRequest;
use App\Http\Requests\API\UpdateBarangPenjualanAPIRequest;
use App\Models\BarangPenjualan;
use App\Repositories\BarangPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangPenjualanController
 * @package App\Http\Controllers\API
 */

class BarangPenjualanAPIController extends AppBaseController
{
    /** @var  BarangPenjualanRepository */
    private $barangPenjualanRepository;

    public function __construct(BarangPenjualanRepository $barangPenjualanRepo)
    {
        $this->barangPenjualanRepository = $barangPenjualanRepo;
    }

    /**
     * Display a listing of the BarangPenjualan.
     * GET|HEAD /barangPenjualan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangPenjualan = $this->barangPenjualanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangPenjualan->toArray(), 'Barang Penjualan retrieved successfully');
    }

    /**
     * Store a newly created BarangPenjualan in storage.
     * POST /barangPenjualan
     *
     * @param CreateBarangPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $barangPenjualan = $this->barangPenjualanRepository->create($input);

        return $this->sendResponse($barangPenjualan->toArray(), 'Barang Penjualan saved successfully');
    }

    /**
     * Display the specified BarangPenjualan.
     * GET|HEAD /barangPenjualan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangPenjualan $barangPenjualan */
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            return $this->sendError('Barang Penjualan not found');
        }

        return $this->sendResponse($barangPenjualan->toArray(), 'Barang Penjualan retrieved successfully');
    }

    /**
     * Update the specified BarangPenjualan in storage.
     * PUT/PATCH /barangPenjualan/{id}
     *
     * @param int $id
     * @param UpdateBarangPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangPenjualan $barangPenjualan */
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            return $this->sendError('Barang Penjualan not found');
        }

        $barangPenjualan = $this->barangPenjualanRepository->update($input, $id);

        return $this->sendResponse($barangPenjualan->toArray(), 'BarangPenjualan updated successfully');
    }

    /**
     * Remove the specified BarangPenjualan from storage.
     * DELETE /barangPenjualan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangPenjualan $barangPenjualan */
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            return $this->sendError('Barang Penjualan not found');
        }

        $barangPenjualan->delete();

        return $this->sendSuccess('Barang Penjualan deleted successfully');
    }
}

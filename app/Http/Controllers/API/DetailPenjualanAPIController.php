<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailPenjualanAPIRequest;
use App\Http\Requests\API\UpdateDetailPenjualanAPIRequest;
use App\Models\DetailPenjualan;
use App\Repositories\DetailPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DetailPenjualanController
 * @package App\Http\Controllers\API
 */

class DetailPenjualanAPIController extends AppBaseController
{
    /** @var  DetailPenjualanRepository */
    private $detailPenjualanRepository;

    public function __construct(DetailPenjualanRepository $detailPenjualanRepo)
    {
        $this->detailPenjualanRepository = $detailPenjualanRepo;
    }

    /**
     * Display a listing of the DetailPenjualan.
     * GET|HEAD /detailPenjualan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $detailPenjualan = $this->detailPenjualanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($detailPenjualan->toArray(), 'Detail Penjualan retrieved successfully');
    }

    /**
     * Store a newly created DetailPenjualan in storage.
     * POST /detailPenjualan
     *
     * @param CreateDetailPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $detailPenjualan = $this->detailPenjualanRepository->create($input);

        return $this->sendResponse($detailPenjualan->toArray(), 'Detail Penjualan saved successfully');
    }

    /**
     * Display the specified DetailPenjualan.
     * GET|HEAD /detailPenjualan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        return $this->sendResponse($detailPenjualan->toArray(), 'Detail Penjualan retrieved successfully');
    }

    /**
     * Update the specified DetailPenjualan in storage.
     * PUT/PATCH /detailPenjualan/{id}
     *
     * @param int $id
     * @param UpdateDetailPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        $detailPenjualan = $this->detailPenjualanRepository->update($input, $id);

        return $this->sendResponse($detailPenjualan->toArray(), 'DetailPenjualan updated successfully');
    }

    /**
     * Remove the specified DetailPenjualan from storage.
     * DELETE /detailPenjualan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        $detailPenjualan->delete();

        return $this->sendSuccess('Detail Penjualan deleted successfully');
    }
}

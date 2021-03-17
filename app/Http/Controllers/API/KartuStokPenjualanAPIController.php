<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKartuStokPenjualanAPIRequest;
use App\Http\Requests\API\UpdateKartuStokPenjualanAPIRequest;
use App\Models\KartuStokPenjualan;
use App\Repositories\KartuStokPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KartuStokPenjualanController
 * @package App\Http\Controllers\API
 */

class KartuStokPenjualanAPIController extends AppBaseController
{
    /** @var  KartuStokPenjualanRepository */
    private $kartuStokPenjualanRepository;

    public function __construct(KartuStokPenjualanRepository $kartuStokPenjualanRepo)
    {
        $this->kartuStokPenjualanRepository = $kartuStokPenjualanRepo;
    }

    /**
     * Display a listing of the KartuStokPenjualan.
     * GET|HEAD /kartuStokPenjualan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kartuStokPenjualan->toArray(), 'Kartu Stok Penjualan retrieved successfully');
    }

    /**
     * Store a newly created KartuStokPenjualan in storage.
     * POST /kartuStokPenjualan
     *
     * @param CreateKartuStokPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->create($input);

        return $this->sendResponse($kartuStokPenjualan->toArray(), 'Kartu Stok Penjualan saved successfully');
    }

    /**
     * Display the specified KartuStokPenjualan.
     * GET|HEAD /kartuStokPenjualan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KartuStokPenjualan $kartuStokPenjualan */
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            return $this->sendError('Kartu Stok Penjualan not found');
        }

        return $this->sendResponse($kartuStokPenjualan->toArray(), 'Kartu Stok Penjualan retrieved successfully');
    }

    /**
     * Update the specified KartuStokPenjualan in storage.
     * PUT/PATCH /kartuStokPenjualan/{id}
     *
     * @param int $id
     * @param UpdateKartuStokPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var KartuStokPenjualan $kartuStokPenjualan */
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            return $this->sendError('Kartu Stok Penjualan not found');
        }

        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->update($input, $id);

        return $this->sendResponse($kartuStokPenjualan->toArray(), 'KartuStokPenjualan updated successfully');
    }

    /**
     * Remove the specified KartuStokPenjualan from storage.
     * DELETE /kartuStokPenjualan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KartuStokPenjualan $kartuStokPenjualan */
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            return $this->sendError('Kartu Stok Penjualan not found');
        }

        $kartuStokPenjualan->delete();

        return $this->sendSuccess('Kartu Stok Penjualan deleted successfully');
    }
}

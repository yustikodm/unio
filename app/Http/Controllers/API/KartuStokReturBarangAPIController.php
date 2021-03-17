<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKartuStokReturBarangAPIRequest;
use App\Http\Requests\API\UpdateKartuStokReturBarangAPIRequest;
use App\Models\KartuStokReturBarang;
use App\Repositories\KartuStokReturBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KartuStokReturBarangController
 * @package App\Http\Controllers\API
 */

class KartuStokReturBarangAPIController extends AppBaseController
{
    /** @var  KartuStokReturBarangRepository */
    private $kartuStokReturBarangRepository;

    public function __construct(KartuStokReturBarangRepository $kartuStokReturBarangRepo)
    {
        $this->kartuStokReturBarangRepository = $kartuStokReturBarangRepo;
    }

    /**
     * Display a listing of the KartuStokReturBarang.
     * GET|HEAD /kartuStokReturBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kartuStokReturBarang->toArray(), 'Kartu Stok Retur Barang retrieved successfully');
    }

    /**
     * Store a newly created KartuStokReturBarang in storage.
     * POST /kartuStokReturBarang
     *
     * @param CreateKartuStokReturBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokReturBarangAPIRequest $request)
    {
        $input = $request->all();

        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->create($input);

        return $this->sendResponse($kartuStokReturBarang->toArray(), 'Kartu Stok Retur Barang saved successfully');
    }

    /**
     * Display the specified KartuStokReturBarang.
     * GET|HEAD /kartuStokReturBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KartuStokReturBarang $kartuStokReturBarang */
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            return $this->sendError('Kartu Stok Retur Barang not found');
        }

        return $this->sendResponse($kartuStokReturBarang->toArray(), 'Kartu Stok Retur Barang retrieved successfully');
    }

    /**
     * Update the specified KartuStokReturBarang in storage.
     * PUT/PATCH /kartuStokReturBarang/{id}
     *
     * @param int $id
     * @param UpdateKartuStokReturBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokReturBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var KartuStokReturBarang $kartuStokReturBarang */
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            return $this->sendError('Kartu Stok Retur Barang not found');
        }

        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->update($input, $id);

        return $this->sendResponse($kartuStokReturBarang->toArray(), 'KartuStokReturBarang updated successfully');
    }

    /**
     * Remove the specified KartuStokReturBarang from storage.
     * DELETE /kartuStokReturBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KartuStokReturBarang $kartuStokReturBarang */
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            return $this->sendError('Kartu Stok Retur Barang not found');
        }

        $kartuStokReturBarang->delete();

        return $this->sendSuccess('Kartu Stok Retur Barang deleted successfully');
    }
}

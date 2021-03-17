<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKartuStokTerimaBarangAPIRequest;
use App\Http\Requests\API\UpdateKartuStokTerimaBarangAPIRequest;
use App\Models\KartuStokTerimaBarang;
use App\Repositories\KartuStokTerimaBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KartuStokTerimaBarangController
 * @package App\Http\Controllers\API
 */

class KartuStokTerimaBarangAPIController extends AppBaseController
{
    /** @var  KartuStokTerimaBarangRepository */
    private $kartuStokTerimaBarangRepository;

    public function __construct(KartuStokTerimaBarangRepository $kartuStokTerimaBarangRepo)
    {
        $this->kartuStokTerimaBarangRepository = $kartuStokTerimaBarangRepo;
    }

    /**
     * Display a listing of the KartuStokTerimaBarang.
     * GET|HEAD /kartuStokTerimaBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kartuStokTerimaBarang->toArray(), 'Kartu Stok Terima Barang retrieved successfully');
    }

    /**
     * Store a newly created KartuStokTerimaBarang in storage.
     * POST /kartuStokTerimaBarang
     *
     * @param CreateKartuStokTerimaBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokTerimaBarangAPIRequest $request)
    {
        $input = $request->all();

        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->create($input);

        return $this->sendResponse($kartuStokTerimaBarang->toArray(), 'Kartu Stok Terima Barang saved successfully');
    }

    /**
     * Display the specified KartuStokTerimaBarang.
     * GET|HEAD /kartuStokTerimaBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KartuStokTerimaBarang $kartuStokTerimaBarang */
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            return $this->sendError('Kartu Stok Terima Barang not found');
        }

        return $this->sendResponse($kartuStokTerimaBarang->toArray(), 'Kartu Stok Terima Barang retrieved successfully');
    }

    /**
     * Update the specified KartuStokTerimaBarang in storage.
     * PUT/PATCH /kartuStokTerimaBarang/{id}
     *
     * @param int $id
     * @param UpdateKartuStokTerimaBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokTerimaBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var KartuStokTerimaBarang $kartuStokTerimaBarang */
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            return $this->sendError('Kartu Stok Terima Barang not found');
        }

        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->update($input, $id);

        return $this->sendResponse($kartuStokTerimaBarang->toArray(), 'KartuStokTerimaBarang updated successfully');
    }

    /**
     * Remove the specified KartuStokTerimaBarang from storage.
     * DELETE /kartuStokTerimaBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KartuStokTerimaBarang $kartuStokTerimaBarang */
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            return $this->sendError('Kartu Stok Terima Barang not found');
        }

        $kartuStokTerimaBarang->delete();

        return $this->sendSuccess('Kartu Stok Terima Barang deleted successfully');
    }
}

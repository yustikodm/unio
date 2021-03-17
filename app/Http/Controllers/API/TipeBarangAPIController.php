<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipeBarangAPIRequest;
use App\Http\Requests\API\UpdateTipeBarangAPIRequest;
use App\Models\TipeBarang;
use App\Repositories\TipeBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TipeBarangController
 * @package App\Http\Controllers\API
 */

class TipeBarangAPIController extends AppBaseController
{
    /** @var  TipeBarangRepository */
    private $tipeBarangRepository;

    public function __construct(TipeBarangRepository $tipeBarangRepo)
    {
        $this->tipeBarangRepository = $tipeBarangRepo;
    }

    /**
     * Display a listing of the TipeBarang.
     * GET|HEAD /tipeBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipeBarang = $this->tipeBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipeBarang->toArray(), 'Tipe Barang retrieved successfully');
    }

    /**
     * Store a newly created TipeBarang in storage.
     * POST /tipeBarang
     *
     * @param CreateTipeBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeBarangAPIRequest $request)
    {
        $input = $request->all();

        $tipeBarang = $this->tipeBarangRepository->create($input);

        return $this->sendResponse($tipeBarang->toArray(), 'Tipe Barang saved successfully');
    }

    /**
     * Display the specified TipeBarang.
     * GET|HEAD /tipeBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipeBarang $tipeBarang */
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            return $this->sendError('Tipe Barang not found');
        }

        return $this->sendResponse($tipeBarang->toArray(), 'Tipe Barang retrieved successfully');
    }

    /**
     * Update the specified TipeBarang in storage.
     * PUT/PATCH /tipeBarang/{id}
     *
     * @param int $id
     * @param UpdateTipeBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipeBarang $tipeBarang */
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            return $this->sendError('Tipe Barang not found');
        }

        $tipeBarang = $this->tipeBarangRepository->update($input, $id);

        return $this->sendResponse($tipeBarang->toArray(), 'TipeBarang updated successfully');
    }

    /**
     * Remove the specified TipeBarang from storage.
     * DELETE /tipeBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipeBarang $tipeBarang */
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            return $this->sendError('Tipe Barang not found');
        }

        $tipeBarang->delete();

        return $this->sendSuccess('Tipe Barang deleted successfully');
    }
}

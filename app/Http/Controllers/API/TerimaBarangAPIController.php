<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTerimaBarangAPIRequest;
use App\Http\Requests\API\UpdateTerimaBarangAPIRequest;
use App\Models\TerimaBarang;
use App\Repositories\TerimaBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TerimaBarangController
 * @package App\Http\Controllers\API
 */

class TerimaBarangAPIController extends AppBaseController
{
    /** @var  TerimaBarangRepository */
    private $terimaBarangRepository;

    public function __construct(TerimaBarangRepository $terimaBarangRepo)
    {
        $this->terimaBarangRepository = $terimaBarangRepo;
    }

    /**
     * Display a listing of the TerimaBarang.
     * GET|HEAD /terimaBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $terimaBarang = $this->terimaBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($terimaBarang->toArray(), 'Terima Barang retrieved successfully');
    }

    /**
     * Store a newly created TerimaBarang in storage.
     * POST /terimaBarang
     *
     * @param CreateTerimaBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTerimaBarangAPIRequest $request)
    {
        $input = $request->all();

        $terimaBarang = $this->terimaBarangRepository->create($input);

        return $this->sendResponse($terimaBarang->toArray(), 'Terima Barang saved successfully');
    }

    /**
     * Display the specified TerimaBarang.
     * GET|HEAD /terimaBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TerimaBarang $terimaBarang */
        $terimaBarang = $this->terimaBarangRepository->find($id);

        if (empty($terimaBarang)) {
            return $this->sendError('Terima Barang not found');
        }

        return $this->sendResponse($terimaBarang->toArray(), 'Terima Barang retrieved successfully');
    }

    /**
     * Update the specified TerimaBarang in storage.
     * PUT/PATCH /terimaBarang/{id}
     *
     * @param int $id
     * @param UpdateTerimaBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTerimaBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var TerimaBarang $terimaBarang */
        $terimaBarang = $this->terimaBarangRepository->find($id);

        if (empty($terimaBarang)) {
            return $this->sendError('Terima Barang not found');
        }

        $terimaBarang = $this->terimaBarangRepository->update($input, $id);

        return $this->sendResponse($terimaBarang->toArray(), 'TerimaBarang updated successfully');
    }

    /**
     * Remove the specified TerimaBarang from storage.
     * DELETE /terimaBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TerimaBarang $terimaBarang */
        $terimaBarang = $this->terimaBarangRepository->find($id);

        if (empty($terimaBarang)) {
            return $this->sendError('Terima Barang not found');
        }

        $terimaBarang->delete();

        return $this->sendSuccess('Terima Barang deleted successfully');
    }
}

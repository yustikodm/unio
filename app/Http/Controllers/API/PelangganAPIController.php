<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePelangganAPIRequest;
use App\Http\Requests\API\UpdatePelangganAPIRequest;
use App\Models\Pelanggan;
use App\Repositories\PelangganRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PelangganController
 * @package App\Http\Controllers\API
 */

class PelangganAPIController extends AppBaseController
{
    /** @var  PelangganRepository */
    private $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepo)
    {
        $this->pelangganRepository = $pelangganRepo;
    }

    /**
     * Display a listing of the Pelanggan.
     * GET|HEAD /pelanggan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pelanggan = $this->pelangganRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pelanggan->toArray(), 'Pelanggan retrieved successfully');
    }

    /**
     * Store a newly created Pelanggan in storage.
     * POST /pelanggan
     *
     * @param CreatePelangganAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganAPIRequest $request)
    {
        $input = $request->all();

        $pelanggan = $this->pelangganRepository->create($input);

        return $this->sendResponse($pelanggan->toArray(), 'Pelanggan saved successfully');
    }

    /**
     * Display the specified Pelanggan.
     * GET|HEAD /pelanggan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        return $this->sendResponse($pelanggan->toArray(), 'Pelanggan retrieved successfully');
    }

    /**
     * Update the specified Pelanggan in storage.
     * PUT/PATCH /pelanggan/{id}
     *
     * @param int $id
     * @param UpdatePelangganAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        $pelanggan = $this->pelangganRepository->update($input, $id);

        return $this->sendResponse($pelanggan->toArray(), 'Pelanggan updated successfully');
    }

    /**
     * Remove the specified Pelanggan from storage.
     * DELETE /pelanggan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        $pelanggan->delete();

        return $this->sendSuccess('Pelanggan deleted successfully');
    }
}

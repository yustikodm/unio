<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKartuStokPenyesuaianAPIRequest;
use App\Http\Requests\API\UpdateKartuStokPenyesuaianAPIRequest;
use App\Models\KartuStokPenyesuaian;
use App\Repositories\KartuStokPenyesuaianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KartuStokPenyesuaianController
 * @package App\Http\Controllers\API
 */

class KartuStokPenyesuaianAPIController extends AppBaseController
{
    /** @var  KartuStokPenyesuaianRepository */
    private $kartuStokPenyesuaianRepository;

    public function __construct(KartuStokPenyesuaianRepository $kartuStokPenyesuaianRepo)
    {
        $this->kartuStokPenyesuaianRepository = $kartuStokPenyesuaianRepo;
    }

    /**
     * Display a listing of the KartuStokPenyesuaian.
     * GET|HEAD /kartuStokPenyesuaian
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kartuStokPenyesuaian->toArray(), 'Kartu Stok Penyesuaian retrieved successfully');
    }

    /**
     * Store a newly created KartuStokPenyesuaian in storage.
     * POST /kartuStokPenyesuaian
     *
     * @param CreateKartuStokPenyesuaianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokPenyesuaianAPIRequest $request)
    {
        $input = $request->all();

        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->create($input);

        return $this->sendResponse($kartuStokPenyesuaian->toArray(), 'Kartu Stok Penyesuaian saved successfully');
    }

    /**
     * Display the specified KartuStokPenyesuaian.
     * GET|HEAD /kartuStokPenyesuaian/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KartuStokPenyesuaian $kartuStokPenyesuaian */
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            return $this->sendError('Kartu Stok Penyesuaian not found');
        }

        return $this->sendResponse($kartuStokPenyesuaian->toArray(), 'Kartu Stok Penyesuaian retrieved successfully');
    }

    /**
     * Update the specified KartuStokPenyesuaian in storage.
     * PUT/PATCH /kartuStokPenyesuaian/{id}
     *
     * @param int $id
     * @param UpdateKartuStokPenyesuaianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokPenyesuaianAPIRequest $request)
    {
        $input = $request->all();

        /** @var KartuStokPenyesuaian $kartuStokPenyesuaian */
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            return $this->sendError('Kartu Stok Penyesuaian not found');
        }

        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->update($input, $id);

        return $this->sendResponse($kartuStokPenyesuaian->toArray(), 'KartuStokPenyesuaian updated successfully');
    }

    /**
     * Remove the specified KartuStokPenyesuaian from storage.
     * DELETE /kartuStokPenyesuaian/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KartuStokPenyesuaian $kartuStokPenyesuaian */
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            return $this->sendError('Kartu Stok Penyesuaian not found');
        }

        $kartuStokPenyesuaian->delete();

        return $this->sendSuccess('Kartu Stok Penyesuaian deleted successfully');
    }
}

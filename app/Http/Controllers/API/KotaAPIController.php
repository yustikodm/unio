<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKotaAPIRequest;
use App\Http\Requests\API\UpdateKotaAPIRequest;
use App\Models\Kota;
use App\Repositories\KotaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KotaController
 * @package App\Http\Controllers\API
 */

class KotaAPIController extends AppBaseController
{
    /** @var  KotaRepository */
    private $kotaRepository;

    public function __construct(KotaRepository $kotaRepo)
    {
        $this->kotaRepository = $kotaRepo;
    }

    /**
     * Display a listing of the Kota.
     * GET|HEAD /kota
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kota = $this->kotaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kota->toArray(), 'Kota retrieved successfully');
    }

    /**
     * Store a newly created Kota in storage.
     * POST /kota
     *
     * @param CreateKotaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKotaAPIRequest $request)
    {
        $input = $request->all();

        $kota = $this->kotaRepository->create($input);

        return $this->sendResponse($kota->toArray(), 'Kota saved successfully');
    }

    /**
     * Display the specified Kota.
     * GET|HEAD /kota/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        return $this->sendResponse($kota->toArray(), 'Kota retrieved successfully');
    }

    /**
     * Update the specified Kota in storage.
     * PUT/PATCH /kota/{id}
     *
     * @param int $id
     * @param UpdateKotaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKotaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota = $this->kotaRepository->update($input, $id);

        return $this->sendResponse($kota->toArray(), 'Kota updated successfully');
    }

    /**
     * Remove the specified Kota from storage.
     * DELETE /kota/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota->delete();

        return $this->sendSuccess('Kota deleted successfully');
    }
}

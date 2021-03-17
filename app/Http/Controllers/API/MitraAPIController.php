<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMitraAPIRequest;
use App\Http\Requests\API\UpdateMitraAPIRequest;
use App\Models\Mitra;
use App\Repositories\MitraRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MitraController
 * @package App\Http\Controllers\API
 */

class MitraAPIController extends AppBaseController
{
    /** @var  MitraRepository */
    private $mitraRepository;

    public function __construct(MitraRepository $mitraRepo)
    {
        $this->mitraRepository = $mitraRepo;
    }

    /**
     * Display a listing of the Mitra.
     * GET|HEAD /mitra
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mitra = $this->mitraRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mitra->toArray(), 'Mitra retrieved successfully');
    }

    /**
     * Store a newly created Mitra in storage.
     * POST /mitra
     *
     * @param CreateMitraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMitraAPIRequest $request)
    {
        $input = $request->all();

        $mitra = $this->mitraRepository->create($input);

        return $this->sendResponse($mitra->toArray(), 'Mitra saved successfully');
    }

    /**
     * Display the specified Mitra.
     * GET|HEAD /mitra/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Mitra $mitra */
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            return $this->sendError('Mitra not found');
        }

        return $this->sendResponse($mitra->toArray(), 'Mitra retrieved successfully');
    }

    /**
     * Update the specified Mitra in storage.
     * PUT/PATCH /mitra/{id}
     *
     * @param int $id
     * @param UpdateMitraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMitraAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mitra $mitra */
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            return $this->sendError('Mitra not found');
        }

        $mitra = $this->mitraRepository->update($input, $id);

        return $this->sendResponse($mitra->toArray(), 'Mitra updated successfully');
    }

    /**
     * Remove the specified Mitra from storage.
     * DELETE /mitra/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Mitra $mitra */
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            return $this->sendError('Mitra not found');
        }

        $mitra->delete();

        return $this->sendSuccess('Mitra deleted successfully');
    }
}

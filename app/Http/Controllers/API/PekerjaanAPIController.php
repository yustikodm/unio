<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePekerjaanAPIRequest;
use App\Http\Requests\API\UpdatePekerjaanAPIRequest;
use App\Models\Pekerjaan;
use App\Repositories\PekerjaanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PekerjaanController
 * @package App\Http\Controllers\API
 */

class PekerjaanAPIController extends AppBaseController
{
    /** @var  PekerjaanRepository */
    private $pekerjaanRepository;

    public function __construct(PekerjaanRepository $pekerjaanRepo)
    {
        $this->pekerjaanRepository = $pekerjaanRepo;
    }

    /**
     * Display a listing of the Pekerjaan.
     * GET|HEAD /pekerjaan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pekerjaan = $this->pekerjaanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pekerjaan->toArray(), 'Pekerjaan retrieved successfully');
    }

    /**
     * Store a newly created Pekerjaan in storage.
     * POST /pekerjaan
     *
     * @param CreatePekerjaanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePekerjaanAPIRequest $request)
    {
        $input = $request->all();

        $pekerjaan = $this->pekerjaanRepository->create($input);

        return $this->sendResponse($pekerjaan->toArray(), 'Pekerjaan saved successfully');
    }

    /**
     * Display the specified Pekerjaan.
     * GET|HEAD /pekerjaan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pekerjaan $pekerjaan */
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            return $this->sendError('Pekerjaan not found');
        }

        return $this->sendResponse($pekerjaan->toArray(), 'Pekerjaan retrieved successfully');
    }

    /**
     * Update the specified Pekerjaan in storage.
     * PUT/PATCH /pekerjaan/{id}
     *
     * @param int $id
     * @param UpdatePekerjaanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePekerjaanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pekerjaan $pekerjaan */
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            return $this->sendError('Pekerjaan not found');
        }

        $pekerjaan = $this->pekerjaanRepository->update($input, $id);

        return $this->sendResponse($pekerjaan->toArray(), 'Pekerjaan updated successfully');
    }

    /**
     * Remove the specified Pekerjaan from storage.
     * DELETE /pekerjaan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pekerjaan $pekerjaan */
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            return $this->sendError('Pekerjaan not found');
        }

        $pekerjaan->delete();

        return $this->sendSuccess('Pekerjaan deleted successfully');
    }
}

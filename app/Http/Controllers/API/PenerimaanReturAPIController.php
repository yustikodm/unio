<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenerimaanReturAPIRequest;
use App\Http\Requests\API\UpdatePenerimaanReturAPIRequest;
use App\Models\PenerimaanRetur;
use App\Repositories\PenerimaanReturRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PenerimaanReturController
 * @package App\Http\Controllers\API
 */

class PenerimaanReturAPIController extends AppBaseController
{
    /** @var  PenerimaanReturRepository */
    private $penerimaanReturRepository;

    public function __construct(PenerimaanReturRepository $penerimaanReturRepo)
    {
        $this->penerimaanReturRepository = $penerimaanReturRepo;
    }

    /**
     * Display a listing of the PenerimaanRetur.
     * GET|HEAD /penerimaanRetur
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $penerimaanRetur = $this->penerimaanReturRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penerimaanRetur->toArray(), 'Penerimaan Retur retrieved successfully');
    }

    /**
     * Store a newly created PenerimaanRetur in storage.
     * POST /penerimaanRetur
     *
     * @param CreatePenerimaanReturAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenerimaanReturAPIRequest $request)
    {
        $input = $request->all();

        $penerimaanRetur = $this->penerimaanReturRepository->create($input);

        return $this->sendResponse($penerimaanRetur->toArray(), 'Penerimaan Retur saved successfully');
    }

    /**
     * Display the specified PenerimaanRetur.
     * GET|HEAD /penerimaanRetur/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PenerimaanRetur $penerimaanRetur */
        $penerimaanRetur = $this->penerimaanReturRepository->find($id);

        if (empty($penerimaanRetur)) {
            return $this->sendError('Penerimaan Retur not found');
        }

        return $this->sendResponse($penerimaanRetur->toArray(), 'Penerimaan Retur retrieved successfully');
    }

    /**
     * Update the specified PenerimaanRetur in storage.
     * PUT/PATCH /penerimaanRetur/{id}
     *
     * @param int $id
     * @param UpdatePenerimaanReturAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenerimaanReturAPIRequest $request)
    {
        $input = $request->all();

        /** @var PenerimaanRetur $penerimaanRetur */
        $penerimaanRetur = $this->penerimaanReturRepository->find($id);

        if (empty($penerimaanRetur)) {
            return $this->sendError('Penerimaan Retur not found');
        }

        $penerimaanRetur = $this->penerimaanReturRepository->update($input, $id);

        return $this->sendResponse($penerimaanRetur->toArray(), 'PenerimaanRetur updated successfully');
    }

    /**
     * Remove the specified PenerimaanRetur from storage.
     * DELETE /penerimaanRetur/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PenerimaanRetur $penerimaanRetur */
        $penerimaanRetur = $this->penerimaanReturRepository->find($id);

        if (empty($penerimaanRetur)) {
            return $this->sendError('Penerimaan Retur not found');
        }

        $penerimaanRetur->delete();

        return $this->sendSuccess('Penerimaan Retur deleted successfully');
    }
}

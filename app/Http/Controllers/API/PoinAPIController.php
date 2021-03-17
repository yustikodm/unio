<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePoinAPIRequest;
use App\Http\Requests\API\UpdatePoinAPIRequest;
use App\Models\Poin;
use App\Repositories\PoinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PoinController
 * @package App\Http\Controllers\API
 */

class PoinAPIController extends AppBaseController
{
    /** @var  PoinRepository */
    private $poinRepository;

    public function __construct(PoinRepository $poinRepo)
    {
        $this->poinRepository = $poinRepo;
    }

    /**
     * Display a listing of the Poin.
     * GET|HEAD /poin
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $poin = $this->poinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($poin->toArray(), 'Poin retrieved successfully');
    }

    /**
     * Store a newly created Poin in storage.
     * POST /poin
     *
     * @param CreatePoinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePoinAPIRequest $request)
    {
        $input = $request->all();

        $poin = $this->poinRepository->create($input);

        return $this->sendResponse($poin->toArray(), 'Poin saved successfully');
    }

    /**
     * Display the specified Poin.
     * GET|HEAD /poin/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Poin $poin */
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            return $this->sendError('Poin not found');
        }

        return $this->sendResponse($poin->toArray(), 'Poin retrieved successfully');
    }

    /**
     * Update the specified Poin in storage.
     * PUT/PATCH /poin/{id}
     *
     * @param int $id
     * @param UpdatePoinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoinAPIRequest $request)
    {
        $input = $request->all();

        /** @var Poin $poin */
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            return $this->sendError('Poin not found');
        }

        $poin = $this->poinRepository->update($input, $id);

        return $this->sendResponse($poin->toArray(), 'Poin updated successfully');
    }

    /**
     * Remove the specified Poin from storage.
     * DELETE /poin/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Poin $poin */
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            return $this->sendError('Poin not found');
        }

        $poin->delete();

        return $this->sendSuccess('Poin deleted successfully');
    }
}

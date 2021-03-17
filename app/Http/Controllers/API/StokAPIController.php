<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStokAPIRequest;
use App\Http\Requests\API\UpdateStokAPIRequest;
use App\Models\Stok;
use App\Repositories\StokRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StokController
 * @package App\Http\Controllers\API
 */

class StokAPIController extends AppBaseController
{
    /** @var  StokRepository */
    private $stokRepository;

    public function __construct(StokRepository $stokRepo)
    {
        $this->stokRepository = $stokRepo;
    }

    /**
     * Display a listing of the Stok.
     * GET|HEAD /stok
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stok = $this->stokRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stok->toArray(), 'Stok retrieved successfully');
    }

    /**
     * Store a newly created Stok in storage.
     * POST /stok
     *
     * @param CreateStokAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStokAPIRequest $request)
    {
        $input = $request->all();

        $stok = $this->stokRepository->create($input);

        return $this->sendResponse($stok->toArray(), 'Stok saved successfully');
    }

    /**
     * Display the specified Stok.
     * GET|HEAD /stok/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Stok $stok */
        $stok = $this->stokRepository->find($id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        return $this->sendResponse($stok->toArray(), 'Stok retrieved successfully');
    }

    /**
     * Update the specified Stok in storage.
     * PUT/PATCH /stok/{id}
     *
     * @param int $id
     * @param UpdateStokAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stok $stok */
        $stok = $this->stokRepository->find($id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        $stok = $this->stokRepository->update($input, $id);

        return $this->sendResponse($stok->toArray(), 'Stok updated successfully');
    }

    /**
     * Remove the specified Stok from storage.
     * DELETE /stok/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Stok $stok */
        $stok = $this->stokRepository->find($id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        $stok->delete();

        return $this->sendSuccess('Stok deleted successfully');
    }
}

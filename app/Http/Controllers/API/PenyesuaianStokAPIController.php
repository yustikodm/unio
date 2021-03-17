<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenyesuaianStokAPIRequest;
use App\Http\Requests\API\UpdatePenyesuaianStokAPIRequest;
use App\Models\PenyesuaianStok;
use App\Repositories\PenyesuaianStokRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PenyesuaianStokController
 * @package App\Http\Controllers\API
 */

class PenyesuaianStokAPIController extends AppBaseController
{
    /** @var  PenyesuaianStokRepository */
    private $penyesuaianStokRepository;

    public function __construct(PenyesuaianStokRepository $penyesuaianStokRepo)
    {
        $this->penyesuaianStokRepository = $penyesuaianStokRepo;
    }

    /**
     * Display a listing of the PenyesuaianStok.
     * GET|HEAD /penyesuaianStok
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $penyesuaianStok = $this->penyesuaianStokRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penyesuaianStok->toArray(), 'Penyesuaian Stok retrieved successfully');
    }

    /**
     * Store a newly created PenyesuaianStok in storage.
     * POST /penyesuaianStok
     *
     * @param CreatePenyesuaianStokAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenyesuaianStokAPIRequest $request)
    {
        $input = $request->all();

        $penyesuaianStok = $this->penyesuaianStokRepository->create($input);

        return $this->sendResponse($penyesuaianStok->toArray(), 'Penyesuaian Stok saved successfully');
    }

    /**
     * Display the specified PenyesuaianStok.
     * GET|HEAD /penyesuaianStok/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PenyesuaianStok $penyesuaianStok */
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);

        if (empty($penyesuaianStok)) {
            return $this->sendError('Penyesuaian Stok not found');
        }

        return $this->sendResponse($penyesuaianStok->toArray(), 'Penyesuaian Stok retrieved successfully');
    }

    /**
     * Update the specified PenyesuaianStok in storage.
     * PUT/PATCH /penyesuaianStok/{id}
     *
     * @param int $id
     * @param UpdatePenyesuaianStokAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenyesuaianStokAPIRequest $request)
    {
        $input = $request->all();

        /** @var PenyesuaianStok $penyesuaianStok */
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);

        if (empty($penyesuaianStok)) {
            return $this->sendError('Penyesuaian Stok not found');
        }

        $penyesuaianStok = $this->penyesuaianStokRepository->update($input, $id);

        return $this->sendResponse($penyesuaianStok->toArray(), 'PenyesuaianStok updated successfully');
    }

    /**
     * Remove the specified PenyesuaianStok from storage.
     * DELETE /penyesuaianStok/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PenyesuaianStok $penyesuaianStok */
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);

        if (empty($penyesuaianStok)) {
            return $this->sendError('Penyesuaian Stok not found');
        }

        $penyesuaianStok->delete();

        return $this->sendSuccess('Penyesuaian Stok deleted successfully');
    }
}

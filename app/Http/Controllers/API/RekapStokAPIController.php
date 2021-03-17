<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRekapStokAPIRequest;
use App\Http\Requests\API\UpdateRekapStokAPIRequest;
use App\Models\RekapStok;
use App\Repositories\RekapStokRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RekapStokController
 * @package App\Http\Controllers\API
 */

class RekapStokAPIController extends AppBaseController
{
    /** @var  RekapStokRepository */
    private $rekapStokRepository;

    public function __construct(RekapStokRepository $rekapStokRepo)
    {
        $this->rekapStokRepository = $rekapStokRepo;
    }

    /**
     * Display a listing of the RekapStok.
     * GET|HEAD /rekapStok
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rekapStok = $this->rekapStokRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($rekapStok->toArray(), 'Rekap Stok retrieved successfully');
    }

    /**
     * Store a newly created RekapStok in storage.
     * POST /rekapStok
     *
     * @param CreateRekapStokAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRekapStokAPIRequest $request)
    {
        $input = $request->all();

        $rekapStok = $this->rekapStokRepository->create($input);

        return $this->sendResponse($rekapStok->toArray(), 'Rekap Stok saved successfully');
    }

    /**
     * Display the specified RekapStok.
     * GET|HEAD /rekapStok/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RekapStok $rekapStok */
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            return $this->sendError('Rekap Stok not found');
        }

        return $this->sendResponse($rekapStok->toArray(), 'Rekap Stok retrieved successfully');
    }

    /**
     * Update the specified RekapStok in storage.
     * PUT/PATCH /rekapStok/{id}
     *
     * @param int $id
     * @param UpdateRekapStokAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRekapStokAPIRequest $request)
    {
        $input = $request->all();

        /** @var RekapStok $rekapStok */
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            return $this->sendError('Rekap Stok not found');
        }

        $rekapStok = $this->rekapStokRepository->update($input, $id);

        return $this->sendResponse($rekapStok->toArray(), 'RekapStok updated successfully');
    }

    /**
     * Remove the specified RekapStok from storage.
     * DELETE /rekapStok/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RekapStok $rekapStok */
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            return $this->sendError('Rekap Stok not found');
        }

        $rekapStok->delete();

        return $this->sendSuccess('Rekap Stok deleted successfully');
    }
}

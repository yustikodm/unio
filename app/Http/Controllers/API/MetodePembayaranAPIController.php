<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMetodePembayaranAPIRequest;
use App\Http\Requests\API\UpdateMetodePembayaranAPIRequest;
use App\Models\MetodePembayaran;
use App\Repositories\MetodePembayaranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MetodePembayaranController
 * @package App\Http\Controllers\API
 */

class MetodePembayaranAPIController extends AppBaseController
{
    /** @var  MetodePembayaranRepository */
    private $metodePembayaranRepository;

    public function __construct(MetodePembayaranRepository $metodePembayaranRepo)
    {
        $this->metodePembayaranRepository = $metodePembayaranRepo;
    }

    /**
     * Display a listing of the MetodePembayaran.
     * GET|HEAD /metodePembayaran
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $metodePembayaran = $this->metodePembayaranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($metodePembayaran->toArray(), 'Metode Pembayaran retrieved successfully');
    }

    /**
     * Store a newly created MetodePembayaran in storage.
     * POST /metodePembayaran
     *
     * @param CreateMetodePembayaranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMetodePembayaranAPIRequest $request)
    {
        $input = $request->all();

        $metodePembayaran = $this->metodePembayaranRepository->create($input);

        return $this->sendResponse($metodePembayaran->toArray(), 'Metode Pembayaran saved successfully');
    }

    /**
     * Display the specified MetodePembayaran.
     * GET|HEAD /metodePembayaran/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        return $this->sendResponse($metodePembayaran->toArray(), 'Metode Pembayaran retrieved successfully');
    }

    /**
     * Update the specified MetodePembayaran in storage.
     * PUT/PATCH /metodePembayaran/{id}
     *
     * @param int $id
     * @param UpdateMetodePembayaranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetodePembayaranAPIRequest $request)
    {
        $input = $request->all();

        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        $metodePembayaran = $this->metodePembayaranRepository->update($input, $id);

        return $this->sendResponse($metodePembayaran->toArray(), 'MetodePembayaran updated successfully');
    }

    /**
     * Remove the specified MetodePembayaran from storage.
     * DELETE /metodePembayaran/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        $metodePembayaran->delete();

        return $this->sendSuccess('Metode Pembayaran deleted successfully');
    }
}

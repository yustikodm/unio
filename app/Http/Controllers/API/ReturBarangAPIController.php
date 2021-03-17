<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReturBarangAPIRequest;
use App\Http\Requests\API\UpdateReturBarangAPIRequest;
use App\Models\ReturBarang;
use App\Repositories\ReturBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReturBarangController
 * @package App\Http\Controllers\API
 */

class ReturBarangAPIController extends AppBaseController
{
    /** @var  ReturBarangRepository */
    private $returBarangRepository;

    public function __construct(ReturBarangRepository $returBarangRepo)
    {
        $this->returBarangRepository = $returBarangRepo;
    }

    /**
     * Display a listing of the ReturBarang.
     * GET|HEAD /returBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $returBarang = $this->returBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($returBarang->toArray(), 'Retur Barang retrieved successfully');
    }

    /**
     * Store a newly created ReturBarang in storage.
     * POST /returBarang
     *
     * @param CreateReturBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReturBarangAPIRequest $request)
    {
        $input = $request->all();

        $returBarang = $this->returBarangRepository->create($input);

        return $this->sendResponse($returBarang->toArray(), 'Retur Barang saved successfully');
    }

    /**
     * Display the specified ReturBarang.
     * GET|HEAD /returBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ReturBarang $returBarang */
        $returBarang = $this->returBarangRepository->find($id);

        if (empty($returBarang)) {
            return $this->sendError('Retur Barang not found');
        }

        return $this->sendResponse($returBarang->toArray(), 'Retur Barang retrieved successfully');
    }

    /**
     * Update the specified ReturBarang in storage.
     * PUT/PATCH /returBarang/{id}
     *
     * @param int $id
     * @param UpdateReturBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReturBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReturBarang $returBarang */
        $returBarang = $this->returBarangRepository->find($id);

        if (empty($returBarang)) {
            return $this->sendError('Retur Barang not found');
        }

        $returBarang = $this->returBarangRepository->update($input, $id);

        return $this->sendResponse($returBarang->toArray(), 'ReturBarang updated successfully');
    }

    /**
     * Remove the specified ReturBarang from storage.
     * DELETE /returBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ReturBarang $returBarang */
        $returBarang = $this->returBarangRepository->find($id);

        if (empty($returBarang)) {
            return $this->sendError('Retur Barang not found');
        }

        $returBarang->delete();

        return $this->sendSuccess('Retur Barang deleted successfully');
    }
}

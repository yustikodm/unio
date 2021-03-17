<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMutasiKasAPIRequest;
use App\Http\Requests\API\UpdateMutasiKasAPIRequest;
use App\Models\MutasiKas;
use App\Repositories\MutasiKasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MutasiKasController
 * @package App\Http\Controllers\API
 */

class MutasiKasAPIController extends AppBaseController
{
    /** @var  MutasiKasRepository */
    private $mutasiKasRepository;

    public function __construct(MutasiKasRepository $mutasiKasRepo)
    {
        $this->mutasiKasRepository = $mutasiKasRepo;
    }

    /**
     * Display a listing of the MutasiKas.
     * GET|HEAD /mutasiKas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mutasiKas = $this->mutasiKasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mutasiKas->toArray(), 'Mutasi Kas retrieved successfully');
    }

    /**
     * Store a newly created MutasiKas in storage.
     * POST /mutasiKas
     *
     * @param CreateMutasiKasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMutasiKasAPIRequest $request)
    {
        $input = $request->all();

        $mutasiKas = $this->mutasiKasRepository->create($input);

        return $this->sendResponse($mutasiKas->toArray(), 'Mutasi Kas saved successfully');
    }

    /**
     * Display the specified MutasiKas.
     * GET|HEAD /mutasiKas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MutasiKas $mutasiKas */
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            return $this->sendError('Mutasi Kas not found');
        }

        return $this->sendResponse($mutasiKas->toArray(), 'Mutasi Kas retrieved successfully');
    }

    /**
     * Update the specified MutasiKas in storage.
     * PUT/PATCH /mutasiKas/{id}
     *
     * @param int $id
     * @param UpdateMutasiKasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMutasiKasAPIRequest $request)
    {
        $input = $request->all();

        /** @var MutasiKas $mutasiKas */
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            return $this->sendError('Mutasi Kas not found');
        }

        $mutasiKas = $this->mutasiKasRepository->update($input, $id);

        return $this->sendResponse($mutasiKas->toArray(), 'MutasiKas updated successfully');
    }

    /**
     * Remove the specified MutasiKas from storage.
     * DELETE /mutasiKas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MutasiKas $mutasiKas */
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            return $this->sendError('Mutasi Kas not found');
        }

        $mutasiKas->delete();

        return $this->sendSuccess('Mutasi Kas deleted successfully');
    }
}

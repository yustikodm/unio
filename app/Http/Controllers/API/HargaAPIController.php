<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHargaAPIRequest;
use App\Http\Requests\API\UpdateHargaAPIRequest;
use App\Models\Harga;
use App\Repositories\HargaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HargaController
 * @package App\Http\Controllers\API
 */

class HargaAPIController extends AppBaseController
{
    /** @var  HargaRepository */
    private $hargaRepository;

    public function __construct(HargaRepository $hargaRepo)
    {
        $this->hargaRepository = $hargaRepo;
    }

    /**
     * Display a listing of the Harga.
     * GET|HEAD /harga
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $harga = $this->hargaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($harga->toArray(), 'Harga retrieved successfully');
    }

    /**
     * Store a newly created Harga in storage.
     * POST /harga
     *
     * @param CreateHargaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHargaAPIRequest $request)
    {
        $input = $request->all();

        $harga = $this->hargaRepository->create($input);

        return $this->sendResponse($harga->toArray(), 'Harga saved successfully');
    }

    /**
     * Display the specified Harga.
     * GET|HEAD /harga/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Harga $harga */
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            return $this->sendError('Harga not found');
        }

        return $this->sendResponse($harga->toArray(), 'Harga retrieved successfully');
    }

    /**
     * Update the specified Harga in storage.
     * PUT/PATCH /harga/{id}
     *
     * @param int $id
     * @param UpdateHargaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHargaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Harga $harga */
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            return $this->sendError('Harga not found');
        }

        $harga = $this->hargaRepository->update($input, $id);

        return $this->sendResponse($harga->toArray(), 'Harga updated successfully');
    }

    /**
     * Remove the specified Harga from storage.
     * DELETE /harga/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Harga $harga */
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            return $this->sendError('Harga not found');
        }

        $harga->delete();

        return $this->sendSuccess('Harga deleted successfully');
    }
}

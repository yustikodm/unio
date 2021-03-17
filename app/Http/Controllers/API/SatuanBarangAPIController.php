<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSatuanBarangAPIRequest;
use App\Http\Requests\API\UpdateSatuanBarangAPIRequest;
use App\Models\SatuanBarang;
use App\Repositories\SatuanBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SatuanBarangController
 * @package App\Http\Controllers\API
 */

class SatuanBarangAPIController extends AppBaseController
{
    /** @var  SatuanBarangRepository */
    private $satuanBarangRepository;

    public function __construct(SatuanBarangRepository $satuanBarangRepo)
    {
        $this->satuanBarangRepository = $satuanBarangRepo;
    }

    /**
     * Display a listing of the SatuanBarang.
     * GET|HEAD /satuanBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $satuanBarang = $this->satuanBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($satuanBarang->toArray(), 'Satuan Barang retrieved successfully');
    }

    /**
     * Store a newly created SatuanBarang in storage.
     * POST /satuanBarang
     *
     * @param CreateSatuanBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanBarangAPIRequest $request)
    {
        $input = $request->all();

        $satuanBarang = $this->satuanBarangRepository->create($input);

        return $this->sendResponse($satuanBarang->toArray(), 'Satuan Barang saved successfully');
    }

    /**
     * Display the specified SatuanBarang.
     * GET|HEAD /satuanBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SatuanBarang $satuanBarang */
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            return $this->sendError('Satuan Barang not found');
        }

        return $this->sendResponse($satuanBarang->toArray(), 'Satuan Barang retrieved successfully');
    }

    /**
     * Update the specified SatuanBarang in storage.
     * PUT/PATCH /satuanBarang/{id}
     *
     * @param int $id
     * @param UpdateSatuanBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var SatuanBarang $satuanBarang */
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            return $this->sendError('Satuan Barang not found');
        }

        $satuanBarang = $this->satuanBarangRepository->update($input, $id);

        return $this->sendResponse($satuanBarang->toArray(), 'SatuanBarang updated successfully');
    }

    /**
     * Remove the specified SatuanBarang from storage.
     * DELETE /satuanBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SatuanBarang $satuanBarang */
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            return $this->sendError('Satuan Barang not found');
        }

        $satuanBarang->delete();

        return $this->sendSuccess('Satuan Barang deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubkategoriBarangAPIRequest;
use App\Http\Requests\API\UpdateSubkategoriBarangAPIRequest;
use App\Models\SubkategoriBarang;
use App\Repositories\SubkategoriBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubkategoriBarangController
 * @package App\Http\Controllers\API
 */

class SubkategoriBarangAPIController extends AppBaseController
{
    /** @var  SubkategoriBarangRepository */
    private $subkategoriBarangRepository;

    public function __construct(SubkategoriBarangRepository $subkategoriBarangRepo)
    {
        $this->subkategoriBarangRepository = $subkategoriBarangRepo;
    }

    /**
     * Display a listing of the SubkategoriBarang.
     * GET|HEAD /subkategoriBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subkategoriBarang = $this->subkategoriBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subkategoriBarang->toArray(), 'Subkategori Barang retrieved successfully');
    }

    /**
     * Store a newly created SubkategoriBarang in storage.
     * POST /subkategoriBarang
     *
     * @param CreateSubkategoriBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubkategoriBarangAPIRequest $request)
    {
        $input = $request->all();

        $subkategoriBarang = $this->subkategoriBarangRepository->create($input);

        return $this->sendResponse($subkategoriBarang->toArray(), 'Subkategori Barang saved successfully');
    }

    /**
     * Display the specified SubkategoriBarang.
     * GET|HEAD /subkategoriBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubkategoriBarang $subkategoriBarang */
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            return $this->sendError('Subkategori Barang not found');
        }

        return $this->sendResponse($subkategoriBarang->toArray(), 'Subkategori Barang retrieved successfully');
    }

    /**
     * Update the specified SubkategoriBarang in storage.
     * PUT/PATCH /subkategoriBarang/{id}
     *
     * @param int $id
     * @param UpdateSubkategoriBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubkategoriBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubkategoriBarang $subkategoriBarang */
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            return $this->sendError('Subkategori Barang not found');
        }

        $subkategoriBarang = $this->subkategoriBarangRepository->update($input, $id);

        return $this->sendResponse($subkategoriBarang->toArray(), 'SubkategoriBarang updated successfully');
    }

    /**
     * Remove the specified SubkategoriBarang from storage.
     * DELETE /subkategoriBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubkategoriBarang $subkategoriBarang */
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            return $this->sendError('Subkategori Barang not found');
        }

        $subkategoriBarang->delete();

        return $this->sendSuccess('Subkategori Barang deleted successfully');
    }
}

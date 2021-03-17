<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKategoriBarangAPIRequest;
use App\Http\Requests\API\UpdateKategoriBarangAPIRequest;
use App\Models\KategoriBarang;
use App\Repositories\KategoriBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KategoriBarangController
 * @package App\Http\Controllers\API
 */

class KategoriBarangAPIController extends AppBaseController
{
    /** @var  KategoriBarangRepository */
    private $kategoriBarangRepository;

    public function __construct(KategoriBarangRepository $kategoriBarangRepo)
    {
        $this->kategoriBarangRepository = $kategoriBarangRepo;
    }

    /**
     * Display a listing of the KategoriBarang.
     * GET|HEAD /kategoriBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kategoriBarang = $this->kategoriBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kategoriBarang->toArray(), 'Kategori Barang retrieved successfully');
    }

    /**
     * Store a newly created KategoriBarang in storage.
     * POST /kategoriBarang
     *
     * @param CreateKategoriBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriBarangAPIRequest $request)
    {
        $input = $request->all();

        $kategoriBarang = $this->kategoriBarangRepository->create($input);

        return $this->sendResponse($kategoriBarang->toArray(), 'Kategori Barang saved successfully');
    }

    /**
     * Display the specified KategoriBarang.
     * GET|HEAD /kategoriBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KategoriBarang $kategoriBarang */
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            return $this->sendError('Kategori Barang not found');
        }

        return $this->sendResponse($kategoriBarang->toArray(), 'Kategori Barang retrieved successfully');
    }

    /**
     * Update the specified KategoriBarang in storage.
     * PUT/PATCH /kategoriBarang/{id}
     *
     * @param int $id
     * @param UpdateKategoriBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var KategoriBarang $kategoriBarang */
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            return $this->sendError('Kategori Barang not found');
        }

        $kategoriBarang = $this->kategoriBarangRepository->update($input, $id);

        return $this->sendResponse($kategoriBarang->toArray(), 'KategoriBarang updated successfully');
    }

    /**
     * Remove the specified KategoriBarang from storage.
     * DELETE /kategoriBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KategoriBarang $kategoriBarang */
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            return $this->sendError('Kategori Barang not found');
        }

        $kategoriBarang->delete();

        return $this->sendSuccess('Kategori Barang deleted successfully');
    }
}

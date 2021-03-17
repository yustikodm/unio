<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangPenyesuaianAPIRequest;
use App\Http\Requests\API\UpdateBarangPenyesuaianAPIRequest;
use App\Models\BarangPenyesuaian;
use App\Repositories\BarangPenyesuaianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangPenyesuaianController
 * @package App\Http\Controllers\API
 */

class BarangPenyesuaianAPIController extends AppBaseController
{
    /** @var  BarangPenyesuaianRepository */
    private $barangPenyesuaianRepository;

    public function __construct(BarangPenyesuaianRepository $barangPenyesuaianRepo)
    {
        $this->barangPenyesuaianRepository = $barangPenyesuaianRepo;
    }

    /**
     * Display a listing of the BarangPenyesuaian.
     * GET|HEAD /barangPenyesuaian
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangPenyesuaian = $this->barangPenyesuaianRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangPenyesuaian->toArray(), 'Barang Penyesuaian retrieved successfully');
    }

    /**
     * Store a newly created BarangPenyesuaian in storage.
     * POST /barangPenyesuaian
     *
     * @param CreateBarangPenyesuaianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenyesuaianAPIRequest $request)
    {
        $input = $request->all();

        $barangPenyesuaian = $this->barangPenyesuaianRepository->create($input);

        return $this->sendResponse($barangPenyesuaian->toArray(), 'Barang Penyesuaian saved successfully');
    }

    /**
     * Display the specified BarangPenyesuaian.
     * GET|HEAD /barangPenyesuaian/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangPenyesuaian $barangPenyesuaian */
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            return $this->sendError('Barang Penyesuaian not found');
        }

        return $this->sendResponse($barangPenyesuaian->toArray(), 'Barang Penyesuaian retrieved successfully');
    }

    /**
     * Update the specified BarangPenyesuaian in storage.
     * PUT/PATCH /barangPenyesuaian/{id}
     *
     * @param int $id
     * @param UpdateBarangPenyesuaianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenyesuaianAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangPenyesuaian $barangPenyesuaian */
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            return $this->sendError('Barang Penyesuaian not found');
        }

        $barangPenyesuaian = $this->barangPenyesuaianRepository->update($input, $id);

        return $this->sendResponse($barangPenyesuaian->toArray(), 'BarangPenyesuaian updated successfully');
    }

    /**
     * Remove the specified BarangPenyesuaian from storage.
     * DELETE /barangPenyesuaian/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangPenyesuaian $barangPenyesuaian */
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            return $this->sendError('Barang Penyesuaian not found');
        }

        $barangPenyesuaian->delete();

        return $this->sendSuccess('Barang Penyesuaian deleted successfully');
    }
}

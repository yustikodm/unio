<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangPromoAPIRequest;
use App\Http\Requests\API\UpdateBarangPromoAPIRequest;
use App\Models\BarangPromo;
use App\Repositories\BarangPromoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangPromoController
 * @package App\Http\Controllers\API
 */

class BarangPromoAPIController extends AppBaseController
{
    /** @var  BarangPromoRepository */
    private $barangPromoRepository;

    public function __construct(BarangPromoRepository $barangPromoRepo)
    {
        $this->barangPromoRepository = $barangPromoRepo;
    }

    /**
     * Display a listing of the BarangPromo.
     * GET|HEAD /barangpromo
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangpromo = $this->barangPromoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangpromo->toArray(), 'Barangpromo retrieved successfully');
    }

    /**
     * Store a newly created BarangPromo in storage.
     * POST /barangpromo
     *
     * @param CreateBarangPromoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPromoAPIRequest $request)
    {
        $input = $request->all();

        $barangPromo = $this->barangPromoRepository->create($input);

        return $this->sendResponse($barangPromo->toArray(), 'Barang Promo saved successfully');
    }

    /**
     * Display the specified BarangPromo.
     * GET|HEAD /barangpromo/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangPromo $barangPromo */
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            return $this->sendError('Barang Promo not found');
        }

        return $this->sendResponse($barangPromo->toArray(), 'Barang Promo retrieved successfully');
    }

    /**
     * Update the specified BarangPromo in storage.
     * PUT/PATCH /barangpromo/{id}
     *
     * @param int $id
     * @param UpdateBarangPromoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPromoAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangPromo $barangPromo */
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            return $this->sendError('Barang Promo not found');
        }

        $barangPromo = $this->barangPromoRepository->update($input, $id);

        return $this->sendResponse($barangPromo->toArray(), 'BarangPromo updated successfully');
    }

    /**
     * Remove the specified BarangPromo from storage.
     * DELETE /barangpromo/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangPromo $barangPromo */
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            return $this->sendError('Barang Promo not found');
        }

        $barangPromo->delete();

        return $this->sendSuccess('Barang Promo deleted successfully');
    }
}

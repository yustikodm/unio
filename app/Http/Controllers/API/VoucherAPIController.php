<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoucherAPIRequest;
use App\Http\Requests\API\UpdateVoucherAPIRequest;
use App\Models\Voucher;
use App\Repositories\VoucherRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VoucherController
 * @package App\Http\Controllers\API
 */

class VoucherAPIController extends AppBaseController
{
    /** @var  VoucherRepository */
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepository = $voucherRepo;
    }

    /**
     * Display a listing of the Voucher.
     * GET|HEAD /voucher
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voucher = $this->voucherRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($voucher->toArray(), 'Voucher retrieved successfully');
    }

    /**
     * Store a newly created Voucher in storage.
     * POST /voucher
     *
     * @param CreateVoucherAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoucherAPIRequest $request)
    {
        $input = $request->all();

        $voucher = $this->voucherRepository->create($input);

        return $this->sendResponse($voucher->toArray(), 'Voucher saved successfully');
    }

    /**
     * Display the specified Voucher.
     * GET|HEAD /voucher/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        return $this->sendResponse($voucher->toArray(), 'Voucher retrieved successfully');
    }

    /**
     * Update the specified Voucher in storage.
     * PUT/PATCH /voucher/{id}
     *
     * @param int $id
     * @param UpdateVoucherAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoucherAPIRequest $request)
    {
        $input = $request->all();

        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        $voucher = $this->voucherRepository->update($input, $id);

        return $this->sendResponse($voucher->toArray(), 'Voucher updated successfully');
    }

    /**
     * Remove the specified Voucher from storage.
     * DELETE /voucher/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        $voucher->delete();

        return $this->sendSuccess('Voucher deleted successfully');
    }

    public function getVoucherByJabatanId($idJabatan)
    {
        $voucher = $this->voucherRepository->getVoucerByJabatanId($idJabatan);

        return $this->sendResponse($voucher, 'Voucher retrieved successfully');
    }
}

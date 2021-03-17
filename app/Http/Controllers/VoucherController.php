<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Repositories\VoucherRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VoucherController extends AppBaseController
{
    /** @var  VoucherRepository */
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepository = $voucherRepo;
    }

    /**
     * Display a listing of the Voucher.
     *
     * @param VoucherDataTable $voucherDataTable
     * @return Response
     */
    public function index(VoucherDataTable $voucherDataTable)
    {
        return $voucherDataTable->render('voucher.index');
    }

    /**
     * Show the form for creating a new Voucher.
     *
     * @return Response
     */
    public function create()
    {
        return view('voucher.create');
    }

    /**
     * Store a newly created Voucher in storage.
     *
     * @param CreateVoucherRequest $request
     *
     * @return Response
     */
    public function store(CreateVoucherRequest $request)
    {
        $input = $request->all();

        $voucher = $this->voucherRepository->create($input);

        Flash::success('Voucher saved successfully.');

        return redirect(route('voucher.index'));
    }

    /**
     * Display the specified Voucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('voucher.index'));
        }

        return view('voucher.show')->with('voucher', $voucher);
    }

    /**
     * Show the form for editing the specified Voucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('voucher.index'));
        }

        return view('voucher.edit')->with('voucher', $voucher);
    }

    /**
     * Update the specified Voucher in storage.
     *
     * @param  int              $id
     * @param UpdateVoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoucherRequest $request)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('voucher.index'));
        }

        $voucher = $this->voucherRepository->update($request->all(), $id);

        Flash::success('Voucher updated successfully.');

        return redirect(route('voucher.index'));
    }

    /**
     * Remove the specified Voucher from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('voucher.index'));
        }

        $this->voucherRepository->delete($id);

        Flash::success('Voucher deleted successfully.');

        return redirect(route('voucher.index'));
    }
}

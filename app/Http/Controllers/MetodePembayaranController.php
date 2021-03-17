<?php

namespace App\Http\Controllers;

use App\DataTables\MetodePembayaranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMetodePembayaranRequest;
use App\Http\Requests\UpdateMetodePembayaranRequest;
use App\Repositories\MetodePembayaranRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MetodePembayaranController extends AppBaseController
{
    /** @var  MetodePembayaranRepository */
    private $metodePembayaranRepository;

    public function __construct(MetodePembayaranRepository $metodePembayaranRepo)
    {
        $this->metodePembayaranRepository = $metodePembayaranRepo;
    }

    /**
     * Display a listing of the MetodePembayaran.
     *
     * @param MetodePembayaranDataTable $metodePembayaranDataTable
     * @return Response
     */
    public function index(MetodePembayaranDataTable $metodePembayaranDataTable)
    {
        return $metodePembayaranDataTable->render('metode_pembayaran.index');
    }

    /**
     * Show the form for creating a new MetodePembayaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('metode_pembayaran.create');
    }

    /**
     * Store a newly created MetodePembayaran in storage.
     *
     * @param CreateMetodePembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreateMetodePembayaranRequest $request)
    {
        $input = $request->all();

        $metodePembayaran = $this->metodePembayaranRepository->create($input);

        Flash::success('Metode Pembayaran saved successfully.');

        return redirect(route('metodePembayaran.index'));
    }

    /**
     * Display the specified MetodePembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            Flash::error('Metode Pembayaran not found');

            return redirect(route('metodePembayaran.index'));
        }

        return view('metode_pembayaran.show')->with('metodePembayaran', $metodePembayaran);
    }

    /**
     * Show the form for editing the specified MetodePembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            Flash::error('Metode Pembayaran not found');

            return redirect(route('metodePembayaran.index'));
        }

        return view('metode_pembayaran.edit')->with('metodePembayaran', $metodePembayaran);
    }

    /**
     * Update the specified MetodePembayaran in storage.
     *
     * @param  int              $id
     * @param UpdateMetodePembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetodePembayaranRequest $request)
    {
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            Flash::error('Metode Pembayaran not found');

            return redirect(route('metodePembayaran.index'));
        }

        $metodePembayaran = $this->metodePembayaranRepository->update($request->all(), $id);

        Flash::success('Metode Pembayaran updated successfully.');

        return redirect(route('metodePembayaran.index'));
    }

    /**
     * Remove the specified MetodePembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            Flash::error('Metode Pembayaran not found');

            return redirect(route('metodePembayaran.index'));
        }

        $this->metodePembayaranRepository->delete($id);

        Flash::success('Metode Pembayaran deleted successfully.');

        return redirect(route('metodePembayaran.index'));
    }
}

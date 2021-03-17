<?php

namespace App\Http\Controllers;

use App\DataTables\DetailPenjualanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetailPenjualanRequest;
use App\Http\Requests\UpdateDetailPenjualanRequest;
use App\Repositories\DetailPenjualanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DetailPenjualanController extends AppBaseController
{
    /** @var  DetailPenjualanRepository */
    private $detailPenjualanRepository;

    public function __construct(DetailPenjualanRepository $detailPenjualanRepo)
    {
        $this->detailPenjualanRepository = $detailPenjualanRepo;
    }

    /**
     * Display a listing of the DetailPenjualan.
     *
     * @param DetailPenjualanDataTable $detailPenjualanDataTable
     * @return Response
     */
    public function index(DetailPenjualanDataTable $detailPenjualanDataTable)
    {
        return $detailPenjualanDataTable->render('detail_penjualan.index');
    }

    /**
     * Show the form for creating a new DetailPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_penjualan.create');
    }

    /**
     * Store a newly created DetailPenjualan in storage.
     *
     * @param CreateDetailPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPenjualanRequest $request)
    {
        $input = $request->all();

        $detailPenjualan = $this->detailPenjualanRepository->create($input);

        Flash::success('Detail Penjualan saved successfully.');

        return redirect(route('detailPenjualan.index'));
    }

    /**
     * Display the specified DetailPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            Flash::error('Detail Penjualan not found');

            return redirect(route('detailPenjualan.index'));
        }

        return view('detail_penjualan.show')->with('detailPenjualan', $detailPenjualan);
    }

    /**
     * Show the form for editing the specified DetailPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            Flash::error('Detail Penjualan not found');

            return redirect(route('detailPenjualan.index'));
        }

        return view('detail_penjualan.edit')->with('detailPenjualan', $detailPenjualan);
    }

    /**
     * Update the specified DetailPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateDetailPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPenjualanRequest $request)
    {
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            Flash::error('Detail Penjualan not found');

            return redirect(route('detailPenjualan.index'));
        }

        $detailPenjualan = $this->detailPenjualanRepository->update($request->all(), $id);

        Flash::success('Detail Penjualan updated successfully.');

        return redirect(route('detailPenjualan.index'));
    }

    /**
     * Remove the specified DetailPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPenjualan = $this->detailPenjualanRepository->find($id);

        if (empty($detailPenjualan)) {
            Flash::error('Detail Penjualan not found');

            return redirect(route('detailPenjualan.index'));
        }

        $this->detailPenjualanRepository->delete($id);

        Flash::success('Detail Penjualan deleted successfully.');

        return redirect(route('detailPenjualan.index'));
    }
}

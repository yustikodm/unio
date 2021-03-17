<?php

namespace App\Http\Controllers;

use App\DataTables\BarangPenjualanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangPenjualanRequest;
use App\Http\Requests\UpdateBarangPenjualanRequest;
use App\Repositories\BarangPenjualanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangPenjualanController extends AppBaseController
{
    /** @var  BarangPenjualanRepository */
    private $barangPenjualanRepository;

    public function __construct(BarangPenjualanRepository $barangPenjualanRepo)
    {
        $this->barangPenjualanRepository = $barangPenjualanRepo;
    }

    /**
     * Display a listing of the BarangPenjualan.
     *
     * @param BarangPenjualanDataTable $barangPenjualanDataTable
     * @return Response
     */
    public function index(BarangPenjualanDataTable $barangPenjualanDataTable)
    {
        return $barangPenjualanDataTable->render('barang_penjualan.index');
    }

    /**
     * Show the form for creating a new BarangPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_penjualan.create');
    }

    /**
     * Store a newly created BarangPenjualan in storage.
     *
     * @param CreateBarangPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenjualanRequest $request)
    {
        $input = $request->all();

        $barangPenjualan = $this->barangPenjualanRepository->create($input);

        Flash::success('Barang Penjualan saved successfully.');

        return redirect(route('barangPenjualan.index'));
    }

    /**
     * Display the specified BarangPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            Flash::error('Barang Penjualan not found');

            return redirect(route('barangPenjualan.index'));
        }

        return view('barang_penjualan.show')->with('barangPenjualan', $barangPenjualan);
    }

    /**
     * Show the form for editing the specified BarangPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            Flash::error('Barang Penjualan not found');

            return redirect(route('barangPenjualan.index'));
        }

        return view('barang_penjualan.edit')->with('barangPenjualan', $barangPenjualan);
    }

    /**
     * Update the specified BarangPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateBarangPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenjualanRequest $request)
    {
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            Flash::error('Barang Penjualan not found');

            return redirect(route('barangPenjualan.index'));
        }

        $barangPenjualan = $this->barangPenjualanRepository->update($request->all(), $id);

        Flash::success('Barang Penjualan updated successfully.');

        return redirect(route('barangPenjualan.index'));
    }

    /**
     * Remove the specified BarangPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangPenjualan = $this->barangPenjualanRepository->find($id);

        if (empty($barangPenjualan)) {
            Flash::error('Barang Penjualan not found');

            return redirect(route('barangPenjualan.index'));
        }

        $this->barangPenjualanRepository->delete($id);

        Flash::success('Barang Penjualan deleted successfully.');

        return redirect(route('barangPenjualan.index'));
    }
}

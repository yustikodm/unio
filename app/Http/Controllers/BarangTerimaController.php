<?php

namespace App\Http\Controllers;

use App\DataTables\BarangTerimaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangTerimaRequest;
use App\Http\Requests\UpdateBarangTerimaRequest;
use App\Repositories\BarangTerimaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangTerimaController extends AppBaseController
{
    /** @var  BarangTerimaRepository */
    private $barangTerimaRepository;

    public function __construct(BarangTerimaRepository $barangTerimaRepo)
    {
        $this->barangTerimaRepository = $barangTerimaRepo;
    }

    /**
     * Display a listing of the BarangTerima.
     *
     * @param BarangTerimaDataTable $barangTerimaDataTable
     * @return Response
     */
    public function index(BarangTerimaDataTable $barangTerimaDataTable)
    {
        return $barangTerimaDataTable->render('barang_terima.index');
    }

    /**
     * Show the form for creating a new BarangTerima.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_terima.create');
    }

    /**
     * Store a newly created BarangTerima in storage.
     *
     * @param CreateBarangTerimaRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangTerimaRequest $request)
    {
        $input = $request->all();

        $barangTerima = $this->barangTerimaRepository->create($input);

        Flash::success('Barang Terima saved successfully.');

        return redirect(route('barangTerima.index'));
    }

    /**
     * Display the specified BarangTerima.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            Flash::error('Barang Terima not found');

            return redirect(route('barangTerima.index'));
        }

        return view('barang_terima.show')->with('barangTerima', $barangTerima);
    }

    /**
     * Show the form for editing the specified BarangTerima.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangTerima = $this->barangTerimaRepository->find($id);    

        if (empty($barangTerima)) {
            Flash::error('Barang Terima not found');

            return redirect(route('barangTerima.index'));
        }

        return view('barang_terima.edit')->with('barangTerima', $barangTerima);
    }

    /**
     * Update the specified BarangTerima in storage.
     *
     * @param  int              $id
     * @param UpdateBarangTerimaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangTerimaRequest $request)
    {
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            Flash::error('Barang Terima not found');

            return redirect(route('barangTerima.index'));
        }

        $barangTerima = $this->barangTerimaRepository->update($request->all(), $id);

        Flash::success('Barang Terima updated successfully.');

        return redirect(route('barangTerima.index'));
    }

    /**
     * Remove the specified BarangTerima from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            Flash::error('Barang Terima not found');

            return redirect(route('barangTerima.index'));
        }

        $this->barangTerimaRepository->delete($id);

        Flash::success('Barang Terima deleted successfully.');

        return redirect(route('barangTerima.index'));
    }
}

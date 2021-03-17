<?php

namespace App\Http\Controllers;

use App\DataTables\BarangPenerimaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangPenerimaanRequest;
use App\Http\Requests\UpdateBarangPenerimaanRequest;
use App\Repositories\BarangPenerimaanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangPenerimaanController extends AppBaseController
{
    /** @var  BarangPenerimaanRepository */
    private $barangPenerimaanRepository;

    public function __construct(BarangPenerimaanRepository $barangPenerimaanRepo)
    {
        $this->barangPenerimaanRepository = $barangPenerimaanRepo;
    }

    /**
     * Display a listing of the BarangPenerimaan.
     *
     * @param BarangPenerimaanDataTable $barangPenerimaanDataTable
     * @return Response
     */
    public function index(BarangPenerimaanDataTable $barangPenerimaanDataTable)
    {
        return $barangPenerimaanDataTable->render('barang_penerimaan.index');
    }

    /**
     * Show the form for creating a new BarangPenerimaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_penerimaan.create');
    }

    /**
     * Store a newly created BarangPenerimaan in storage.
     *
     * @param CreateBarangPenerimaanRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenerimaanRequest $request)
    {
        $input = $request->all();

        $barangPenerimaan = $this->barangPenerimaanRepository->create($input);

        Flash::success('Barang Penerimaan saved successfully.');

        return redirect(route('barangPenerimaan.index'));
    }

    /**
     * Display the specified BarangPenerimaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            Flash::error('Barang Penerimaan not found');

            return redirect(route('barangPenerimaan.index'));
        }

        return view('barang_penerimaan.show')->with('barangPenerimaan', $barangPenerimaan);
    }

    /**
     * Show the form for editing the specified BarangPenerimaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            Flash::error('Barang Penerimaan not found');

            return redirect(route('barangPenerimaan.index'));
        }

        return view('barang_penerimaan.edit')->with('barangPenerimaan', $barangPenerimaan);
    }

    /**
     * Update the specified BarangPenerimaan in storage.
     *
     * @param  int              $id
     * @param UpdateBarangPenerimaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenerimaanRequest $request)
    {
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            Flash::error('Barang Penerimaan not found');

            return redirect(route('barangPenerimaan.index'));
        }

        $barangPenerimaan = $this->barangPenerimaanRepository->update($request->all(), $id);

        Flash::success('Barang Penerimaan updated successfully.');

        return redirect(route('barangPenerimaan.index'));
    }

    /**
     * Remove the specified BarangPenerimaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangPenerimaan = $this->barangPenerimaanRepository->find($id);

        if (empty($barangPenerimaan)) {
            Flash::error('Barang Penerimaan not found');

            return redirect(route('barangPenerimaan.index'));
        }

        $this->barangPenerimaanRepository->delete($id);

        Flash::success('Barang Penerimaan deleted successfully.');

        return redirect(route('barangPenerimaan.index'));
    }
}

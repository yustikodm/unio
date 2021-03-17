<?php

namespace App\Http\Controllers;

use App\DataTables\BarangPenyesuaianDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangPenyesuaianRequest;
use App\Http\Requests\UpdateBarangPenyesuaianRequest;
use App\Repositories\BarangPenyesuaianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangPenyesuaianController extends AppBaseController
{
    /** @var  BarangPenyesuaianRepository */
    private $barangPenyesuaianRepository;

    public function __construct(BarangPenyesuaianRepository $barangPenyesuaianRepo)
    {
        $this->barangPenyesuaianRepository = $barangPenyesuaianRepo;
    }

    /**
     * Display a listing of the BarangPenyesuaian.
     *
     * @param BarangPenyesuaianDataTable $barangPenyesuaianDataTable
     * @return Response
     */
    public function index(BarangPenyesuaianDataTable $barangPenyesuaianDataTable)
    {
        return $barangPenyesuaianDataTable->render('barang_penyesuaian.index');
    }

    /**
     * Show the form for creating a new BarangPenyesuaian.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_penyesuaian.create');
    }

    /**
     * Store a newly created BarangPenyesuaian in storage.
     *
     * @param CreateBarangPenyesuaianRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPenyesuaianRequest $request)
    {
        $input = $request->all();

        $barangPenyesuaian = $this->barangPenyesuaianRepository->create($input);

        Flash::success('Barang Penyesuaian saved successfully.');

        return redirect(route('barangPenyesuaian.index'));
    }

    /**
     * Display the specified BarangPenyesuaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            Flash::error('Barang Penyesuaian not found');

            return redirect(route('barangPenyesuaian.index'));
        }

        return view('barang_penyesuaian.show')->with('barangPenyesuaian', $barangPenyesuaian);
    }

    /**
     * Show the form for editing the specified BarangPenyesuaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            Flash::error('Barang Penyesuaian not found');

            return redirect(route('barangPenyesuaian.index'));
        }

        return view('barang_penyesuaian.edit')->with('barangPenyesuaian', $barangPenyesuaian);
    }

    /**
     * Update the specified BarangPenyesuaian in storage.
     *
     * @param  int              $id
     * @param UpdateBarangPenyesuaianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPenyesuaianRequest $request)
    {
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            Flash::error('Barang Penyesuaian not found');

            return redirect(route('barangPenyesuaian.index'));
        }

        $barangPenyesuaian = $this->barangPenyesuaianRepository->update($request->all(), $id);

        Flash::success('Barang Penyesuaian updated successfully.');

        return redirect(route('barangPenyesuaian.index'));
    }

    /**
     * Remove the specified BarangPenyesuaian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangPenyesuaian = $this->barangPenyesuaianRepository->find($id);

        if (empty($barangPenyesuaian)) {
            Flash::error('Barang Penyesuaian not found');

            return redirect(route('barangPenyesuaian.index'));
        }

        $this->barangPenyesuaianRepository->delete($id);

        Flash::success('Barang Penyesuaian deleted successfully.');

        return redirect(route('barangPenyesuaian.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\BarangReturDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangReturRequest;
use App\Http\Requests\UpdateBarangReturRequest;
use App\Repositories\BarangReturRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangReturController extends AppBaseController
{
    /** @var  BarangReturRepository */
    private $barangReturRepository;

    public function __construct(BarangReturRepository $barangReturRepo)
    {
        $this->barangReturRepository = $barangReturRepo;
    }

    /**
     * Display a listing of the BarangRetur.
     *
     * @param BarangReturDataTable $barangReturDataTable
     * @return Response
     */
    public function index(BarangReturDataTable $barangReturDataTable)
    {
        return $barangReturDataTable->render('barang_retur.index');
    }

    /**
     * Show the form for creating a new BarangRetur.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_retur.create');
    }

    /**
     * Store a newly created BarangRetur in storage.
     *
     * @param CreateBarangReturRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangReturRequest $request)
    {
        $input = $request->all();

        $barangRetur = $this->barangReturRepository->create($input);

        Flash::success('Barang Retur saved successfully.');

        return redirect(route('barangRetur.index'));
    }

    /**
     * Display the specified BarangRetur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            Flash::error('Barang Retur not found');

            return redirect(route('barangRetur.index'));
        }

        return view('barang_retur.show')->with('barangRetur', $barangRetur);
    }

    /**
     * Show the form for editing the specified BarangRetur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            Flash::error('Barang Retur not found');

            return redirect(route('barangRetur.index'));
        }

        return view('barang_retur.edit')->with('barangRetur', $barangRetur);
    }

    /**
     * Update the specified BarangRetur in storage.
     *
     * @param  int              $id
     * @param UpdateBarangReturRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangReturRequest $request)
    {
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            Flash::error('Barang Retur not found');

            return redirect(route('barangRetur.index'));
        }

        $barangRetur = $this->barangReturRepository->update($request->all(), $id);

        Flash::success('Barang Retur updated successfully.');

        return redirect(route('barangRetur.index'));
    }

    /**
     * Remove the specified BarangRetur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangRetur = $this->barangReturRepository->find($id);

        if (empty($barangRetur)) {
            Flash::error('Barang Retur not found');

            return redirect(route('barangRetur.index'));
        }

        $this->barangReturRepository->delete($id);

        Flash::success('Barang Retur deleted successfully.');

        return redirect(route('barangRetur.index'));
    }
}

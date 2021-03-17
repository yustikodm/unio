<?php

namespace App\Http\Controllers;

use App\DataTables\KartuStokReturBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKartuStokReturBarangRequest;
use App\Http\Requests\UpdateKartuStokReturBarangRequest;
use App\Repositories\KartuStokReturBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KartuStokReturBarangController extends AppBaseController
{
    /** @var  KartuStokReturBarangRepository */
    private $kartuStokReturBarangRepository;

    public function __construct(KartuStokReturBarangRepository $kartuStokReturBarangRepo)
    {
        $this->kartuStokReturBarangRepository = $kartuStokReturBarangRepo;
    }

    /**
     * Display a listing of the KartuStokReturBarang.
     *
     * @param KartuStokReturBarangDataTable $kartuStokReturBarangDataTable
     * @return Response
     */
    public function index(KartuStokReturBarangDataTable $kartuStokReturBarangDataTable)
    {
        return $kartuStokReturBarangDataTable->render('kartu_stok_retur_barang.index');
    }

    /**
     * Show the form for creating a new KartuStokReturBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('kartu_stok_retur_barang.create');
    }

    /**
     * Store a newly created KartuStokReturBarang in storage.
     *
     * @param CreateKartuStokReturBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokReturBarangRequest $request)
    {
        $input = $request->all();

        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->create($input);

        Flash::success('Kartu Stok Retur Barang saved successfully.');

        return redirect(route('kartuStokReturBarang.index'));
    }

    /**
     * Display the specified KartuStokReturBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->getkartuStokRetur($id);

        if (empty($kartuStokReturBarang)) {
            Flash::error('Kartu Stok Retur Barang not found');

            return redirect(route('kartuStokReturBarang.index'));
        }

        return view('kartu_stok_retur_barang.show')->with('kartuStokReturBarang', $kartuStokReturBarang);
    }

    /**
     * Show the form for editing the specified KartuStokReturBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            Flash::error('Kartu Stok Retur Barang not found');

            return redirect(route('kartuStokReturBarang.index'));
        }

        return view('kartu_stok_retur_barang.edit')->with('kartuStokReturBarang', $kartuStokReturBarang);
    }

    /**
     * Update the specified KartuStokReturBarang in storage.
     *
     * @param  int              $id
     * @param UpdateKartuStokReturBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokReturBarangRequest $request)
    {
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            Flash::error('Kartu Stok Retur Barang not found');

            return redirect(route('kartuStokReturBarang.index'));
        }

        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->update($request->all(), $id);

        Flash::success('Kartu Stok Retur Barang updated successfully.');

        return redirect(route('kartuStokReturBarang.index'));
    }

    /**
     * Remove the specified KartuStokReturBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kartuStokReturBarang = $this->kartuStokReturBarangRepository->find($id);

        if (empty($kartuStokReturBarang)) {
            Flash::error('Kartu Stok Retur Barang not found');

            return redirect(route('kartuStokReturBarang.index'));
        }

        $this->kartuStokReturBarangRepository->delete($id);

        Flash::success('Kartu Stok Retur Barang deleted successfully.');

        return redirect(route('kartuStokReturBarang.index'));
    }
}

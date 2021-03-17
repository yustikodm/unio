<?php

namespace App\Http\Controllers;

use App\DataTables\KartuStokTerimaBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKartuStokTerimaBarangRequest;
use App\Http\Requests\UpdateKartuStokTerimaBarangRequest;
use App\Repositories\KartuStokTerimaBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KartuStokTerimaBarangController extends AppBaseController
{
    /** @var  KartuStokTerimaBarangRepository */
    private $kartuStokTerimaBarangRepository;

    public function __construct(KartuStokTerimaBarangRepository $kartuStokTerimaBarangRepo)
    {
        $this->kartuStokTerimaBarangRepository = $kartuStokTerimaBarangRepo;
    }

    /**
     * Display a listing of the KartuStokTerimaBarang.
     *
     * @param KartuStokTerimaBarangDataTable $kartuStokTerimaBarangDataTable
     * @return Response
     */
    public function index(KartuStokTerimaBarangDataTable $kartuStokTerimaBarangDataTable)
    {
        return $kartuStokTerimaBarangDataTable->render('kartu_stok_terima_barang.index');
    }

    /**
     * Show the form for creating a new KartuStokTerimaBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('kartu_stok_terima_barang.create');
    }

    /**
     * Store a newly created KartuStokTerimaBarang in storage.
     *
     * @param CreateKartuStokTerimaBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokTerimaBarangRequest $request)
    {
        $input = $request->all();

        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->create($input);

        Flash::success('Kartu Stok Terima Barang saved successfully.');

        return redirect(route('kartuStokTerimaBarang.index'));
    }

    /**
     * Display the specified KartuStokTerimaBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->getKartuStokTerima($id);

        if (empty($kartuStokTerimaBarang)) {
            Flash::error('Kartu Stok Terima Barang not found');

            return redirect(route('kartuStokTerimaBarang.index'));
        }

        return view('kartu_stok_terima_barang.show')->with('kartuStokTerimaBarang', $kartuStokTerimaBarang);
    }

    /**
     * Show the form for editing the specified KartuStokTerimaBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            Flash::error('Kartu Stok Terima Barang not found');

            return redirect(route('kartuStokTerimaBarang.index'));
        }

        return view('kartu_stok_terima_barang.edit')->with('kartuStokTerimaBarang', $kartuStokTerimaBarang);
    }

    /**
     * Update the specified KartuStokTerimaBarang in storage.
     *
     * @param  int              $id
     * @param UpdateKartuStokTerimaBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokTerimaBarangRequest $request)
    {
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            Flash::error('Kartu Stok Terima Barang not found');

            return redirect(route('kartuStokTerimaBarang.index'));
        }

        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->update($request->all(), $id);

        Flash::success('Kartu Stok Terima Barang updated successfully.');

        return redirect(route('kartuStokTerimaBarang.index'));
    }

    /**
     * Remove the specified KartuStokTerimaBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->find($id);

        if (empty($kartuStokTerimaBarang)) {
            Flash::error('Kartu Stok Terima Barang not found');

            return redirect(route('kartuStokTerimaBarang.index'));
        }

        $this->kartuStokTerimaBarangRepository->delete($id);

        Flash::success('Kartu Stok Terima Barang deleted successfully.');

        return redirect(route('kartuStokTerimaBarang.index'));
    }
}

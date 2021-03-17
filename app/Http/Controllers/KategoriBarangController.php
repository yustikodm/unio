<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKategoriBarangRequest;
use App\Http\Requests\UpdateKategoriBarangRequest;
use App\Repositories\KategoriBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KategoriBarangController extends AppBaseController
{
    /** @var  KategoriBarangRepository */
    private $kategoriBarangRepository;

    public function __construct(KategoriBarangRepository $kategoriBarangRepo)
    {
        $this->kategoriBarangRepository = $kategoriBarangRepo;
    }

    /**
     * Display a listing of the KategoriBarang.
     *
     * @param KategoriBarangDataTable $kategoriBarangDataTable
     * @return Response
     */
    public function index(KategoriBarangDataTable $kategoriBarangDataTable)
    {
        return $kategoriBarangDataTable->render('kategori_barang.index');
    }

    /**
     * Show the form for creating a new KategoriBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_barang.create');
    }

    /**
     * Store a newly created KategoriBarang in storage.
     *
     * @param CreateKategoriBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriBarangRequest $request)
    {
        $input = $request->all();

        $kategoriBarang = $this->kategoriBarangRepository->create($input);

        Flash::success('Kategori Barang saved successfully.');

        return redirect(route('kategoriBarang.index'));
    }

    /**
     * Display the specified KategoriBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            Flash::error('Kategori Barang not found');

            return redirect(route('kategoriBarang.index'));
        }

        return view('kategori_barang.show')->with('kategoriBarang', $kategoriBarang);
    }

    /**
     * Show the form for editing the specified KategoriBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            Flash::error('Kategori Barang not found');

            return redirect(route('kategoriBarang.index'));
        }

        return view('kategori_barang.edit')->with('kategoriBarang', $kategoriBarang);
    }

    /**
     * Update the specified KategoriBarang in storage.
     *
     * @param  int              $id
     * @param UpdateKategoriBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriBarangRequest $request)
    {
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            Flash::error('Kategori Barang not found');

            return redirect(route('kategoriBarang.index'));
        }

        $kategoriBarang = $this->kategoriBarangRepository->update($request->all(), $id);

        Flash::success('Kategori Barang updated successfully.');

        return redirect(route('kategoriBarang.index'));
    }

    /**
     * Remove the specified KategoriBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriBarang = $this->kategoriBarangRepository->find($id);

        if (empty($kategoriBarang)) {
            Flash::error('Kategori Barang not found');

            return redirect(route('kategoriBarang.index'));
        }

        $this->kategoriBarangRepository->delete($id);

        Flash::success('Kategori Barang deleted successfully.');

        return redirect(route('kategoriBarang.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\SubkategoriBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubkategoriBarangRequest;
use App\Http\Requests\UpdateSubkategoriBarangRequest;
use App\Repositories\SubkategoriBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubkategoriBarangController extends AppBaseController
{
    /** @var  SubkategoriBarangRepository */
    private $subkategoriBarangRepository;

    public function __construct(SubkategoriBarangRepository $subkategoriBarangRepo)
    {
        $this->subkategoriBarangRepository = $subkategoriBarangRepo;
    }

    /**
     * Display a listing of the SubkategoriBarang.
     *
     * @param SubkategoriBarangDataTable $subkategoriBarangDataTable
     * @return Response
     */
    public function index(SubkategoriBarangDataTable $subkategoriBarangDataTable)
    {
        return $subkategoriBarangDataTable->render('subkategori_barang.index');
    }

    /**
     * Show the form for creating a new SubkategoriBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('subkategori_barang.create');
    }

    /**
     * Store a newly created SubkategoriBarang in storage.
     *
     * @param CreateSubkategoriBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateSubkategoriBarangRequest $request)
    {
        $input = $request->all();

        $subkategoriBarang = $this->subkategoriBarangRepository->create($input);

        Flash::success('Subkategori Barang saved successfully.');

        return redirect(route('subkategoriBarang.index'));
    }

    /**
     * Display the specified SubkategoriBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            Flash::error('Subkategori Barang not found');

            return redirect(route('subkategoriBarang.index'));
        }

        return view('subkategori_barang.show')->with('subkategoriBarang', $subkategoriBarang);
    }

    /**
     * Show the form for editing the specified SubkategoriBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            Flash::error('Subkategori Barang not found');

            return redirect(route('subkategoriBarang.index'));
        }

        return view('subkategori_barang.edit')->with('subkategoriBarang', $subkategoriBarang);
    }

    /**
     * Update the specified SubkategoriBarang in storage.
     *
     * @param  int              $id
     * @param UpdateSubkategoriBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubkategoriBarangRequest $request)
    {
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            Flash::error('Subkategori Barang not found');

            return redirect(route('subkategoriBarang.index'));
        }

        $subkategoriBarang = $this->subkategoriBarangRepository->update($request->all(), $id);

        Flash::success('Subkategori Barang updated successfully.');

        return redirect(route('subkategoriBarang.index'));
    }

    /**
     * Remove the specified SubkategoriBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subkategoriBarang = $this->subkategoriBarangRepository->find($id);

        if (empty($subkategoriBarang)) {
            Flash::error('Subkategori Barang not found');

            return redirect(route('subkategoriBarang.index'));
        }

        $this->subkategoriBarangRepository->delete($id);

        Flash::success('Subkategori Barang deleted successfully.');

        return redirect(route('subkategoriBarang.index'));
    }
}

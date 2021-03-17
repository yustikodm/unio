<?php

namespace App\Http\Controllers;

use App\DataTables\SatuanBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSatuanBarangRequest;
use App\Http\Requests\UpdateSatuanBarangRequest;
use App\Repositories\SatuanBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SatuanBarangController extends AppBaseController
{
    /** @var  SatuanBarangRepository */
    private $satuanBarangRepository;

    public function __construct(SatuanBarangRepository $satuanBarangRepo)
    {
        $this->satuanBarangRepository = $satuanBarangRepo;
    }

    /**
     * Display a listing of the SatuanBarang.
     *
     * @param SatuanBarangDataTable $satuanBarangDataTable
     * @return Response
     */
    public function index(SatuanBarangDataTable $satuanBarangDataTable)
    {
        return $satuanBarangDataTable->render('satuan_barang.index');
    }

    /**
     * Show the form for creating a new SatuanBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('satuan_barang.create');
    }

    /**
     * Store a newly created SatuanBarang in storage.
     *
     * @param CreateSatuanBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanBarangRequest $request)
    {
        $input = $request->all();

        $satuanBarang = $this->satuanBarangRepository->create($input);

        Flash::success('Satuan Barang saved successfully.');

        return redirect(route('satuanBarang.index'));
    }

    /**
     * Display the specified SatuanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            Flash::error('Satuan Barang not found');

            return redirect(route('satuanBarang.index'));
        }

        return view('satuan_barang.show')->with('satuanBarang', $satuanBarang);
    }

    /**
     * Show the form for editing the specified SatuanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            Flash::error('Satuan Barang not found');

            return redirect(route('satuanBarang.index'));
        }

        return view('satuan_barang.edit')->with('satuanBarang', $satuanBarang);
    }

    /**
     * Update the specified SatuanBarang in storage.
     *
     * @param  int              $id
     * @param UpdateSatuanBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanBarangRequest $request)
    {
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            Flash::error('Satuan Barang not found');

            return redirect(route('satuanBarang.index'));
        }

        $satuanBarang = $this->satuanBarangRepository->update($request->all(), $id);

        Flash::success('Satuan Barang updated successfully.');

        return redirect(route('satuanBarang.index'));
    }

    /**
     * Remove the specified SatuanBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $satuanBarang = $this->satuanBarangRepository->find($id);

        if (empty($satuanBarang)) {
            Flash::error('Satuan Barang not found');

            return redirect(route('satuanBarang.index'));
        }

        $this->satuanBarangRepository->delete($id);

        Flash::success('Satuan Barang deleted successfully.');

        return redirect(route('satuanBarang.index'));
    }
}

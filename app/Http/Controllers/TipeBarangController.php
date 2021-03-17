<?php

namespace App\Http\Controllers;

use App\DataTables\TipeBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTipeBarangRequest;
use App\Http\Requests\UpdateTipeBarangRequest;
use App\Repositories\TipeBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TipeBarangController extends AppBaseController
{
    /** @var  TipeBarangRepository */
    private $tipeBarangRepository;

    public function __construct(TipeBarangRepository $tipeBarangRepo)
    {
        $this->tipeBarangRepository = $tipeBarangRepo;
    }

    /**
     * Display a listing of the TipeBarang.
     *
     * @param TipeBarangDataTable $tipeBarangDataTable
     * @return Response
     */
    public function index(TipeBarangDataTable $tipeBarangDataTable)
    {
        return $tipeBarangDataTable->render('tipe_barang.index');
    }

    /**
     * Show the form for creating a new TipeBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipe_barang.create');
    }

    /**
     * Store a newly created TipeBarang in storage.
     *
     * @param CreateTipeBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeBarangRequest $request)
    {
        $input = $request->all();

        $tipeBarang = $this->tipeBarangRepository->create($input);

        Flash::success('Tipe Barang saved successfully.');

        return redirect(route('tipeBarang.index'));
    }

    /**
     * Display the specified TipeBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            Flash::error('Tipe Barang not found');

            return redirect(route('tipeBarang.index'));
        }

        return view('tipe_barang.show')->with('tipeBarang', $tipeBarang);
    }

    /**
     * Show the form for editing the specified TipeBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            Flash::error('Tipe Barang not found');

            return redirect(route('tipeBarang.index'));
        }

        return view('tipe_barang.edit')->with('tipeBarang', $tipeBarang);
    }

    /**
     * Update the specified TipeBarang in storage.
     *
     * @param  int              $id
     * @param UpdateTipeBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeBarangRequest $request)
    {
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            Flash::error('Tipe Barang not found');

            return redirect(route('tipeBarang.index'));
        }

        $tipeBarang = $this->tipeBarangRepository->update($request->all(), $id);

        Flash::success('Tipe Barang updated successfully.');

        return redirect(route('tipeBarang.index'));
    }

    /**
     * Remove the specified TipeBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipeBarang = $this->tipeBarangRepository->find($id);

        if (empty($tipeBarang)) {
            Flash::error('Tipe Barang not found');

            return redirect(route('tipeBarang.index'));
        }

        $this->tipeBarangRepository->delete($id);

        Flash::success('Tipe Barang deleted successfully.');

        return redirect(route('tipeBarang.index'));
    }
}

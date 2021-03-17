<?php

namespace App\Http\Controllers;

use App\DataTables\KartuStokPenyesuaianDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKartuStokPenyesuaianRequest;
use App\Http\Requests\UpdateKartuStokPenyesuaianRequest;
use App\Repositories\KartuStokPenyesuaianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KartuStokPenyesuaianController extends AppBaseController
{
    /** @var  KartuStokPenyesuaianRepository */
    private $kartuStokPenyesuaianRepository;

    public function __construct(KartuStokPenyesuaianRepository $kartuStokPenyesuaianRepo)
    {
        $this->kartuStokPenyesuaianRepository = $kartuStokPenyesuaianRepo;
    }

    /**
     * Display a listing of the KartuStokPenyesuaian.
     *
     * @param KartuStokPenyesuaianDataTable $kartuStokPenyesuaianDataTable
     * @return Response
     */
    public function index(KartuStokPenyesuaianDataTable $kartuStokPenyesuaianDataTable)
    {
        return $kartuStokPenyesuaianDataTable->render('kartu_stok_penyesuaian.index');
    }

    /**
     * Show the form for creating a new KartuStokPenyesuaian.
     *
     * @return Response
     */
    public function create()
    {
        return view('kartu_stok_penyesuaian.create');
    }

    /**
     * Store a newly created KartuStokPenyesuaian in storage.
     *
     * @param CreateKartuStokPenyesuaianRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokPenyesuaianRequest $request)
    {
        $input = $request->all();

        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->create($input);

        Flash::success('Kartu Stok Penyesuaian saved successfully.');

        return redirect(route('kartuStokPenyesuaian.index'));
    }

    /**
     * Display the specified KartuStokPenyesuaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->getKartuStokPenyesuaian($id);

        if (empty($kartuStokPenyesuaian)) {
            Flash::error('Kartu Stok Penyesuaian not found');

            return redirect(route('kartuStokPenyesuaian.index'));
        }

        return view('kartu_stok_penyesuaian.show')->with('kartuStokPenyesuaian', $kartuStokPenyesuaian);
    }

    /**
     * Show the form for editing the specified KartuStokPenyesuaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            Flash::error('Kartu Stok Penyesuaian not found');

            return redirect(route('kartuStokPenyesuaian.index'));
        }

        return view('kartu_stok_penyesuaian.edit')->with('kartuStokPenyesuaian', $kartuStokPenyesuaian);
    }

    /**
     * Update the specified KartuStokPenyesuaian in storage.
     *
     * @param  int              $id
     * @param UpdateKartuStokPenyesuaianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokPenyesuaianRequest $request)
    {
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            Flash::error('Kartu Stok Penyesuaian not found');

            return redirect(route('kartuStokPenyesuaian.index'));
        }

        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->update($request->all(), $id);

        Flash::success('Kartu Stok Penyesuaian updated successfully.');

        return redirect(route('kartuStokPenyesuaian.index'));
    }

    /**
     * Remove the specified KartuStokPenyesuaian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kartuStokPenyesuaian = $this->kartuStokPenyesuaianRepository->find($id);

        if (empty($kartuStokPenyesuaian)) {
            Flash::error('Kartu Stok Penyesuaian not found');

            return redirect(route('kartuStokPenyesuaian.index'));
        }

        $this->kartuStokPenyesuaianRepository->delete($id);

        Flash::success('Kartu Stok Penyesuaian deleted successfully.');

        return redirect(route('kartuStokPenyesuaian.index'));
    }
}

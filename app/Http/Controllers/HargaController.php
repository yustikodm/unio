<?php

namespace App\Http\Controllers;

use App\DataTables\HargaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHargaRequest;
use App\Http\Requests\UpdateHargaRequest;
use App\Repositories\HargaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HargaController extends AppBaseController
{
    /** @var  HargaRepository */
    private $hargaRepository;

    public function __construct(HargaRepository $hargaRepo)
    {
        $this->hargaRepository = $hargaRepo;
    }

    /**
     * Display a listing of the Harga.
     *
     * @param HargaDataTable $hargaDataTable
     * @return Response
     */
    public function index(HargaDataTable $hargaDataTable)
    {
        return $hargaDataTable->render('harga.index');
    }

    /**
     * Show the form for creating a new Harga.
     *
     * @return Response
     */
    public function create()
    {
        return view('harga.create');
    }

    /**
     * Store a newly created Harga in storage.
     *
     * @param CreateHargaRequest $request
     *
     * @return Response
     */
    public function store(CreateHargaRequest $request)
    {
        $input = $request->all();

        $harga = $this->hargaRepository->create($input);

        Flash::success('Harga saved successfully.');

        return redirect(route('harga.index'));
    }

    /**
     * Display the specified Harga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $harga = $this->hargaRepository->getHarga($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('harga.index'));
        }

        return view('harga.show')->with('harga', $harga);
    }

    /**
     * Show the form for editing the specified Harga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('harga.index'));
        }

        return view('harga.edit')->with('harga', $harga);
    }

    /**
     * Update the specified Harga in storage.
     *
     * @param  int              $id
     * @param UpdateHargaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHargaRequest $request)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('harga.index'));
        }

        $harga = $this->hargaRepository->update($request->all(), $id);

        Flash::success('Harga updated successfully.');

        return redirect(route('harga.index'));
    }

    /**
     * Remove the specified Harga from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('harga.index'));
        }

        $this->hargaRepository->delete($id);

        Flash::success('Harga deleted successfully.');

        return redirect(route('harga.index'));
    }
}

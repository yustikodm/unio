<?php

namespace App\Http\Controllers;

use App\DataTables\PekerjaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePekerjaanRequest;
use App\Http\Requests\UpdatePekerjaanRequest;
use App\Repositories\PekerjaanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PekerjaanController extends AppBaseController
{
    /** @var  PekerjaanRepository */
    private $pekerjaanRepository;

    public function __construct(PekerjaanRepository $pekerjaanRepo)
    {
        $this->pekerjaanRepository = $pekerjaanRepo;
    }

    /**
     * Display a listing of the Pekerjaan.
     *
     * @param PekerjaanDataTable $pekerjaanDataTable
     * @return Response
     */
    public function index(PekerjaanDataTable $pekerjaanDataTable)
    {
        return $pekerjaanDataTable->render('pekerjaan.index');
    }

    /**
     * Show the form for creating a new Pekerjaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pekerjaan.create');
    }

    /**
     * Store a newly created Pekerjaan in storage.
     *
     * @param CreatePekerjaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePekerjaanRequest $request)
    {
        $input = $request->all();

        $pekerjaan = $this->pekerjaanRepository->create($input);

        Flash::success('Pekerjaan saved successfully.');

        return redirect(route('pekerjaan.index'));
    }

    /**
     * Display the specified Pekerjaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            Flash::error('Pekerjaan not found');

            return redirect(route('pekerjaan.index'));
        }

        return view('pekerjaan.show')->with('pekerjaan', $pekerjaan);
    }

    /**
     * Show the form for editing the specified Pekerjaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            Flash::error('Pekerjaan not found');

            return redirect(route('pekerjaan.index'));
        }

        return view('pekerjaan.edit')->with('pekerjaan', $pekerjaan);
    }

    /**
     * Update the specified Pekerjaan in storage.
     *
     * @param  int              $id
     * @param UpdatePekerjaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePekerjaanRequest $request)
    {
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            Flash::error('Pekerjaan not found');

            return redirect(route('pekerjaan.index'));
        }

        $pekerjaan = $this->pekerjaanRepository->update($request->all(), $id);

        Flash::success('Pekerjaan updated successfully.');

        return redirect(route('pekerjaan.index'));
    }

    /**
     * Remove the specified Pekerjaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pekerjaan = $this->pekerjaanRepository->find($id);

        if (empty($pekerjaan)) {
            Flash::error('Pekerjaan not found');

            return redirect(route('pekerjaan.index'));
        }

        $this->pekerjaanRepository->delete($id);

        Flash::success('Pekerjaan deleted successfully.');

        return redirect(route('pekerjaan.index'));
    }
}

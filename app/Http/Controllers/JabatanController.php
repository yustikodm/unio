<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Repositories\JabatanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JabatanController extends AppBaseController
{
    /** @var  JabatanRepository */
    private $jabatanRepository;

    public function __construct(JabatanRepository $jabatanRepo)
    {
        $this->jabatanRepository = $jabatanRepo;
    }

    /**
     * Display a listing of the Jabatan.
     *
     * @param JabatanDataTable $jabatanDataTable
     * @return Response
     */
    public function index(JabatanDataTable $jabatanDataTable)
    {
        return $jabatanDataTable->render('jabatan.index');
    }

    /**
     * Show the form for creating a new Jabatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created Jabatan in storage.
     *
     * @param CreateJabatanRequest $request
     *
     * @return Response
     */
    public function store(CreateJabatanRequest $request)
    {
        $input = $request->all();

        $jabatan = $this->jabatanRepository->create($input);

        Flash::success('Jabatan saved successfully.');

        return redirect(route('jabatan.index'));
    }

    /**
     * Display the specified Jabatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatan.index'));
        }

        return view('jabatan.show')->with('jabatan', $jabatan);
    }

    /**
     * Show the form for editing the specified Jabatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatan.index'));
        }

        return view('jabatan.edit')->with('jabatan', $jabatan);
    }

    /**
     * Update the specified Jabatan in storage.
     *
     * @param  int              $id
     * @param UpdateJabatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJabatanRequest $request)
    {
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatan.index'));
        }

        $jabatan = $this->jabatanRepository->update($request->all(), $id);

        Flash::success('Jabatan updated successfully.');

        return redirect(route('jabatan.index'));
    }

    /**
     * Remove the specified Jabatan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatan.index'));
        }

        $this->jabatanRepository->delete($id);

        Flash::success('Jabatan deleted successfully.');

        return redirect(route('jabatan.index'));
    }
}

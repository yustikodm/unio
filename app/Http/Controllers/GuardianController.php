<?php

namespace App\Http\Controllers;

use App\DataTables\GuardianDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Repositories\GuardianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GuardianController extends AppBaseController
{
    /** @var  GuardianRepository */
    private $guardianRepository;

    public function __construct(GuardianRepository $guardianRepo)
    {
        $this->guardianRepository = $guardianRepo;
    }

    /**
     * Display a listing of the Guardian.
     *
     * @param GuardianDataTable $guardianDataTable
     * @return Response
     */
    public function index(GuardianDataTable $guardianDataTable)
    {
        return $guardianDataTable->render('guardians.index');
    }

    /**
     * Show the form for creating a new Guardian.
     *
     * @return Response
     */
    public function create()
    {
        return view('guardians.create');
    }

    /**
     * Store a newly created Guardian in storage.
     *
     * @param CreateGuardianRequest $request
     *
     * @return Response
     */
    public function store(CreateGuardianRequest $request)
    {
        $input = $request->all();

        $guardian = $this->guardianRepository->create($input);

        Flash::success('Guardian saved successfully.');

        return redirect(route('guardians.index'));
    }

    /**
     * Display the specified Guardian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            Flash::error('Guardian not found');

            return redirect(route('guardians.index'));
        }

        return view('guardians.show')->with('guardian', $guardian);
    }

    /**
     * Show the form for editing the specified Guardian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            Flash::error('Guardian not found');

            return redirect(route('guardians.index'));
        }

        return view('guardians.edit')->with('guardian', $guardian);
    }

    /**
     * Update the specified Guardian in storage.
     *
     * @param  int              $id
     * @param UpdateGuardianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGuardianRequest $request)
    {
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            Flash::error('Guardian not found');

            return redirect(route('guardians.index'));
        }

        $guardian = $this->guardianRepository->update($request->all(), $id);

        Flash::success('Guardian updated successfully.');

        return redirect(route('guardians.index'));
    }

    /**
     * Remove the specified Guardian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            Flash::error('Guardian not found');

            return redirect(route('guardians.index'));
        }

        $this->guardianRepository->delete($id);

        Flash::success('Guardian deleted successfully.');

        return redirect(route('guardians.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\MasterMajorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterMajorRequest;
use App\Http\Requests\UpdateMasterMajorRequest;
use App\Repositories\MasterMajorRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class MasterMajorController extends AppBaseController
{
    /** @var  MasterMajorRepository */
    private $masterMajorRepository;

    public function __construct(MasterMajorRepository $masterMajorRepo)
    {
        $this->masterMajorRepository = $masterMajorRepo;
    }

    /**
     * Display a listing of the MasterMajor.
     *
     * @param MasterMajorDataTable $masterMajorDataTable
     * @return Response
     */
    public function index(MasterMajorDataTable $masterMajorDataTable)
    {
        return $masterMajorDataTable->render('master_majors.index');
    }

    /**
     * Show the form for creating a new MasterMajor.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_majors.create');
    }

    /**
     * Store a newly created MasterMajor in storage.
     *
     * @param CreateMasterMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMajorRequest $request)
    {
        $input = $request->only(['major_id', 'name', 'description']);

        $masterMajor = $this->masterMajorRepository->create($input);

        Flash::success('Master Major saved successfully.');

        return redirect(route('masterMajors.index'));
    }

    /**
     * Display the specified MasterMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMajor = $this->masterMajorRepository->find($id);

        if (empty($masterMajor)) {
            Flash::error('Master Major not found');

            return redirect(route('masterMajors.index'));
        }

        return view('master_majors.show')->with('masterMajor', $masterMajor);
    }

    /**
     * Show the form for editing the specified MasterMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMajor = $this->masterMajorRepository->find($id);

        if (empty($masterMajor)) {
            Flash::error('Master Major not found');

            return redirect(route('masterMajors.index'));
        }

        return view('master_majors.edit')->with('masterMajor', $masterMajor);
    }

    /**
     * Update the specified MasterMajor in storage.
     *
     * @param  int              $id
     * @param UpdateMasterMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMajorRequest $request)
    {
        $masterMajor = $this->masterMajorRepository->find($id);

        if (empty($masterMajor)) {
            Flash::error('Master Major not found');

            return redirect(route('masterMajors.index'));
        }

        $input = $request->only(['major_id', 'name', 'description']);

        $masterMajor = $this->masterMajorRepository->update($input, $id);

        Flash::success('Master Major updated successfully.');

        return redirect(route('masterMajors.index'));
    }

    /**
     * Remove the specified MasterMajor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMajor = $this->masterMajorRepository->find($id);

        if (empty($masterMajor)) {
            Flash::error('Master Major not found');

            return redirect(route('masterMajors.index'));
        }

        $this->masterMajorRepository->delete($id);

        Flash::success('Master Major deleted successfully.');

        return redirect(route('masterMajors.index'));
    }
}

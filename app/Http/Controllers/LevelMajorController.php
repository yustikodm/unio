<?php

namespace App\Http\Controllers;

use App\DataTables\LevelMajorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLevelMajorRequest;
use App\Http\Requests\UpdateLevelMajorRequest;
use App\Repositories\LevelMajorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LevelMajorController extends AppBaseController
{
    /** @var  LevelMajorRepository */
    private $levelMajorRepository;

    public function __construct(LevelMajorRepository $levelMajorRepo)
    {
        $this->levelMajorRepository = $levelMajorRepo;
    }

    /**
     * Display a listing of the LevelMajor.
     *
     * @param LevelMajorDataTable $levelMajorDataTable
     * @return Response
     */
    public function index(LevelMajorDataTable $levelMajorDataTable)
    {
        return $levelMajorDataTable->render('level_major.index');
    }

    /**
     * Show the form for creating a new LevelMajor.
     *
     * @return Response
     */
    public function create()
    {
        return view('level_major.create');
    }

    /**
     * Store a newly created LevelMajor in storage.
     *
     * @param CreateLevelMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelMajorRequest $request)
    {
        $input = $request->all();

        $levelMajor = $this->levelMajorRepository->create($input);

        Flash::success('Level Major saved successfully.');

        return redirect(route('levelMajor.index'));
    }

    /**
     * Display the specified LevelMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            Flash::error('Level Major not found');

            return redirect(route('levelMajor.index'));
        }

        return view('level_major.show')->with('levelMajor', $levelMajor);
    }

    /**
     * Show the form for editing the specified LevelMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            Flash::error('Level Major not found');

            return redirect(route('levelMajor.index'));
        }

        return view('level_major.edit')->with('levelMajor', $levelMajor);
    }

    /**
     * Update the specified LevelMajor in storage.
     *
     * @param  int              $id
     * @param UpdateLevelMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelMajorRequest $request)
    {
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            Flash::error('Level Major not found');

            return redirect(route('levelMajor.index'));
        }

        $levelMajor = $this->levelMajorRepository->update($request->all(), $id);

        Flash::success('Level Major updated successfully.');

        return redirect(route('levelMajor.index'));
    }

    /**
     * Remove the specified LevelMajor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            Flash::error('Level Major not found');

            return redirect(route('levelMajor.index'));
        }

        $this->levelMajorRepository->delete($id);

        Flash::success('Level Major deleted successfully.');

        return redirect(route('levelMajor.index'));
    }
}

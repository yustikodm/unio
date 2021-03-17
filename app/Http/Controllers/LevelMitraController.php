<?php

namespace App\Http\Controllers;

use App\DataTables\LevelMitraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLevelMitraRequest;
use App\Http\Requests\UpdateLevelMitraRequest;
use App\Repositories\LevelMitraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LevelMitraController extends AppBaseController
{
    /** @var  LevelMitraRepository */
    private $levelMitraRepository;

    public function __construct(LevelMitraRepository $levelMitraRepo)
    {
        $this->levelMitraRepository = $levelMitraRepo;
    }

    /**
     * Display a listing of the LevelMitra.
     *
     * @param LevelMitraDataTable $levelMitraDataTable
     * @return Response
     */
    public function index(LevelMitraDataTable $levelMitraDataTable)
    {
        return $levelMitraDataTable->render('level_mitra.index');
    }

    /**
     * Show the form for creating a new LevelMitra.
     *
     * @return Response
     */
    public function create()
    {
        return view('level_mitra.create');
    }

    /**
     * Store a newly created LevelMitra in storage.
     *
     * @param CreateLevelMitraRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelMitraRequest $request)
    {
        $input = $request->all();

        $levelMitra = $this->levelMitraRepository->create($input);

        Flash::success('Level Mitra saved successfully.');

        return redirect(route('levelMitra.index'));
    }

    /**
     * Display the specified LevelMitra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            Flash::error('Level Mitra not found');

            return redirect(route('levelMitra.index'));
        }

        return view('level_mitra.show')->with('levelMitra', $levelMitra);
    }

    /**
     * Show the form for editing the specified LevelMitra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            Flash::error('Level Mitra not found');

            return redirect(route('levelMitra.index'));
        }

        return view('level_mitra.edit')->with('levelMitra', $levelMitra);
    }

    /**
     * Update the specified LevelMitra in storage.
     *
     * @param  int              $id
     * @param UpdateLevelMitraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelMitraRequest $request)
    {
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            Flash::error('Level Mitra not found');

            return redirect(route('levelMitra.index'));
        }

        $levelMitra = $this->levelMitraRepository->update($request->all(), $id);

        Flash::success('Level Mitra updated successfully.');

        return redirect(route('levelMitra.index'));
    }

    /**
     * Remove the specified LevelMitra from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            Flash::error('Level Mitra not found');

            return redirect(route('levelMitra.index'));
        }

        $this->levelMitraRepository->delete($id);

        Flash::success('Level Mitra deleted successfully.');

        return redirect(route('levelMitra.index'));
    }
}

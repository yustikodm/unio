<?php

namespace App\Http\Controllers;

use App\DataTables\ReligionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReligionRequest;
use App\Http\Requests\UpdateReligionRequest;
use App\Repositories\ReligionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class ReligionController extends AppBaseController
{
    /** @var  ReligionRepository */
    private $religionRepository;

    public function __construct(ReligionRepository $religionRepo)
    {
        $this->religionRepository = $religionRepo;
    }

    /**
     * Display a listing of the Religion.
     *
     * @param ReligionDataTable $religionDataTable
     * @return Response
     */
    public function index(ReligionDataTable $religionDataTable)
    {
        return $religionDataTable->render('religions.index');
    }

    /**
     * Show the form for creating a new Religion.
     *
     * @return Response
     */
    public function create()
    {
        return view('religions.create');
    }

    /**
     * Store a newly created Religion in storage.
     *
     * @param CreateReligionRequest $request
     *
     * @return Response
     */
    public function store(CreateReligionRequest $request)
    {
        $input = $request->only(['name']);

        $religion = $this->religionRepository->create($input);

        Flash::success('Religion saved successfully.');

        return redirect(route('religions.index'));
    }

    /**
     * Display the specified Religion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error('Religion not found');

            return redirect(route('religions.index'));
        }

        return view('religions.show')->with('religion', $religion);
    }

    /**
     * Show the form for editing the specified Religion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error('Religion not found');

            return redirect(route('religions.index'));
        }

        return view('religions.edit')->with('religion', $religion);
    }

    /**
     * Update the specified Religion in storage.
     *
     * @param  int              $id
     * @param UpdateReligionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReligionRequest $request)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error('Religion not found');

            return redirect(route('religions.index'));
        }

        $religion = $this->religionRepository->update($request->all(), $id);

        Flash::success('Religion updated successfully.');

        return redirect(route('religions.index'));
    }

    /**
     * Remove the specified Religion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error('Religion not found');

            return redirect(route('religions.index'));
        }

        $this->religionRepository->delete($id);

        Flash::success('Religion deleted successfully.');

        return redirect(route('religions.index'));
    }
}

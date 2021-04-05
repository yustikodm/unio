<?php

namespace App\Http\Controllers;

use App\DataTables\PointTopupDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePointTopupRequest;
use App\Http\Requests\UpdatePointTopupRequest;
use App\Repositories\PointTopupRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PointTopupController extends AppBaseController
{
    /** @var  PointTopupRepository */
    private $pointTopupRepository;

    public function __construct(PointTopupRepository $pointTopupRepo)
    {
        $this->pointTopupRepository = $pointTopupRepo;
    }

    /**
     * Display a listing of the PointTopup.
     *
     * @param PointTopupDataTable $pointTopupDataTable
     * @return Response
     */
    public function index(PointTopupDataTable $pointTopupDataTable)
    {
        return $pointTopupDataTable->render('point_topups.index');
    }

    /**
     * Show the form for creating a new PointTopup.
     *
     * @return Response
     */
    public function create()
    {
        return view('point_topups.create');
    }

    /**
     * Store a newly created PointTopup in storage.
     *
     * @param CreatePointTopupRequest $request
     *
     * @return Response
     */
    public function store(CreatePointTopupRequest $request)
    {
        $input = $request->all();

        $pointTopup = $this->pointTopupRepository->create($input);

        Flash::success('Point Topup saved successfully.');

        return redirect(route('point-topups.index'));
    }

    /**
     * Display the specified PointTopup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointTopup = $this->pointTopupRepository->find($id);

        if (empty($pointTopup)) {
            Flash::error('Point Topup not found');

            return redirect(route('point-topups.index'));
        }

        return view('point_topups.show')->with('pointTopup', $pointTopup);
    }

    /**
     * Show the form for editing the specified PointTopup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointTopup = $this->pointTopupRepository->find($id);

        if (empty($pointTopup)) {
            Flash::error('Point Topup not found');

            return redirect(route('point-topups.index'));
        }

        return view('point_topups.edit')->with('pointTopup', $pointTopup);
    }

    /**
     * Update the specified PointTopup in storage.
     *
     * @param  int              $id
     * @param UpdatePointTopupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointTopupRequest $request)
    {
        $pointTopup = $this->pointTopupRepository->find($id);

        if (empty($pointTopup)) {
            Flash::error('Point Topup not found');

            return redirect(route('point-topups.index'));
        }

        $pointTopup = $this->pointTopupRepository->update($request->all(), $id);

        Flash::success('Point Topup updated successfully.');

        return redirect(route('point-topups.index'));
    }

    /**
     * Remove the specified PointTopup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointTopup = $this->pointTopupRepository->find($id);

        if (empty($pointTopup)) {
            Flash::error('Point Topup not found');

            return redirect(route('point-topups.index'));
        }

        $this->pointTopupRepository->delete($id);

        Flash::success('Point Topup deleted successfully.');

        return redirect(route('point-topups.index'));
    }
}

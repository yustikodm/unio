<?php

namespace App\Http\Controllers;

use App\DataTables\PointPricingsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePointPricingsRequest;
use App\Http\Requests\UpdatePointPricingsRequest;
use App\Repositories\PointPricingsRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class PointPricingsController extends AppBaseController
{
    /** @var  PointPricingsRepository */
    private $pointPricingsRepository;

    public function __construct(PointPricingsRepository $pointPricingsRepo)
    {
        $this->pointPricingsRepository = $pointPricingsRepo;
    }

    /**
     * Display a listing of the PointPricings.
     *
     * @param PointPricingsDataTable $pointPricingsDataTable
     * @return Response
     */
    public function index(PointPricingsDataTable $pointPricingsDataTable)
    {
        return $pointPricingsDataTable->render('point_pricings.index');
    }

    /**
     * Show the form for creating a new PointPricings.
     *
     * @return Response
     */
    public function create()
    {
        return view('point_pricings.create');
    }

    /**
     * Store a newly created PointPricings in storage.
     *
     * @param CreatePointPricingsRequest $request
     *
     * @return Response
     */
    public function store(CreatePointPricingsRequest $request)
    {
        $input = $request->all();

        $pointPricings = $this->pointPricingsRepository->create($input);

        Flash::success('Point Pricings saved successfully.');

        return redirect(route('point-pricings.index'));
    }

    /**
     * Display the specified PointPricings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointPricings = $this->pointPricingsRepository->find($id);

        if (empty($pointPricings)) {
            Flash::error('Point Pricings not found');

            return redirect(route('point-pricings.index'));
        }

        return view('point_pricings.show')->with('pointPricings', $pointPricings);
    }

    /**
     * Show the form for editing the specified PointPricings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointPricings = $this->pointPricingsRepository->find($id);

        if (empty($pointPricings)) {
            Flash::error('Point Pricings not found');

            return redirect(route('point-pricings.index'));
        }

        return view('point_pricings.edit')->with('pointPricings', $pointPricings);
    }

    /**
     * Update the specified PointPricings in storage.
     *
     * @param  int              $id
     * @param UpdatePointPricingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointPricingsRequest $request)
    {
        $pointPricings = $this->pointPricingsRepository->find($id);

        if (empty($pointPricings)) {
            Flash::error('Point Pricings not found');

            return redirect(route('point-pricings.index'));
        }

        $pointPricings = $this->pointPricingsRepository->update($request->all(), $id);

        Flash::success('Point Pricings updated successfully.');

        return redirect(route('point-pricings.index'));
    }

    /**
     * Remove the specified PointPricings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointPricings = $this->pointPricingsRepository->find($id);

        if (empty($pointPricings)) {
            Flash::error('Point Pricings not found');

            return redirect(route('point-pricings.index'));
        }

        $this->pointPricingsRepository->delete($id);

        Flash::success('Point Pricings deleted successfully.');

        return redirect(route('point-pricings.index'));
    }
}

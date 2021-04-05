<?php

namespace App\Http\Controllers;

use App\DataTables\PricingPointDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePricingPointRequest;
use App\Http\Requests\UpdatePricingPointRequest;
use App\Repositories\PricingPointRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PricingPointController extends AppBaseController
{
    /** @var  PricingPointRepository */
    private $pricingPointRepository;

    public function __construct(PricingPointRepository $pricingPointRepo)
    {
        $this->pricingPointRepository = $pricingPointRepo;
    }

    /**
     * Display a listing of the PricingPoint.
     *
     * @param PricingPointDataTable $pricingPointDataTable
     * @return Response
     */
    public function index(PricingPointDataTable $pricingPointDataTable)
    {
        return $pricingPointDataTable->render('pricing_points.index');
    }

    /**
     * Store a newly created PricingPoint in storage.
     *
     * @param CreatePricingPointRequest $request
     *
     * @return Response
     */
    public function store(CreatePricingPointRequest $request)
    {
        $input = $request->only([
            'entity_id',
            'entity_type',
            'amount',
        ]);

        $this->pricingPointRepository->create($input);

        // Flash::success('Pricing Point saved successfully.');

        // return redirect(route('pricing-points'));
    }

    /**
     * Display the specified PricingPoint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pricingPoint = $this->pricingPointRepository->find($id);

        if (empty($pricingPoint)) {
            Flash::error('Pricing Point not found');

            return redirect(route('pricing-points'));
        }

        return view('pricing_points.show')->with('pricingPoint', $pricingPoint);
    }

    /**
     * Show the form for editing the specified PricingPoint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pricingPoint = $this->pricingPointRepository->find($id);

        if (empty($pricingPoint)) {
            Flash::error('Pricing Point not found');

            return redirect(route('pricing-points'));
        }

        return view('pricing_points.edit')->with('pricingPoint', $pricingPoint);
    }

    /**
     * Update the specified PricingPoint in storage.
     *
     * @param  int              $id
     * @param UpdatePricingPointRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePricingPointRequest $request)
    {
        $pricingPoint = $this->pricingPointRepository->find($id);

        if (empty($pricingPoint)) {
            Flash::error('Pricing Point not found');

            return redirect(route('pricing-points'));
        }

        $pricingPoint = $this->pricingPointRepository->update($request->all(), $id);

        Flash::success('Pricing Point updated successfully.');

        return redirect(route('pricing-points'));
    }

    /**
     * Remove the specified PricingPoint from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pricingPoint = $this->pricingPointRepository->find($id);

        if (empty($pricingPoint)) {
            Flash::error('Pricing Point not found');

            return redirect(route('pricing-points'));
        }

        $this->pricingPointRepository->delete($id);

        Flash::success('Pricing Point deleted successfully.');

        return redirect(route('pricing-points'));
    }
}

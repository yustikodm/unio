<?php

namespace App\Http\Controllers;

use App\DataTables\PlaceToLiveDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePlaceToLiveRequest;
use App\Http\Requests\UpdatePlaceToLiveRequest;
use App\Repositories\PlaceToLiveRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PricingPointRepository;
use Response;

class PlaceToLiveController extends AppBaseController
{
    /** @var  PlaceToLiveRepository */
    private $placeToLiveRepository;

    /** @var  PricingPointRepository */
    private $pricingPointRepository;

    public function __construct(PlaceToLiveRepository $placeToLiveRepo, PricingPointRepository $pricingPointRepo)
    {
        $this->placeToLiveRepository = $placeToLiveRepo;
        
        $this->pricingPointRepository = $pricingPointRepo;
    }

    /**
     * Display a listing of the PlaceToLive.
     *
     * @param PlaceToLiveDataTable $placeToLiveDataTable
     * @return Response
     */
    public function index(PlaceToLiveDataTable $placeToLiveDataTable)
    {
        return $placeToLiveDataTable->render('place_to_lives.index');
    }

    /**
     * Show the form for creating a new PlaceToLive.
     *
     * @return Response
     */
    public function create()
    {
        return view('place_to_lives.create');
    }

    /**
     * Store a newly created PlaceToLive in storage.
     *
     * @param CreatePlaceToLiveRequest $request
     *
     * @return Response
     */
    public function store(CreatePlaceToLiveRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'name',
            'description',
            'price',
            'address',
            'phone',
            'picture'
        ]);

        $placeToLive = $this->placeToLiveRepository->create($input);

        $this->pricingPointRepository->create([
            'entity_id' => $placeToLive->id,
            'entity_type' => 'placetolive',
            'amount' => $request->price,
        ]);

        Flash::success('Place To Live saved successfully.');

        return redirect(route('place-to-live.index'));
    }

    /**
     * Display the specified PlaceToLive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $placeToLive = $this->placeToLiveRepository->find($id);

        if (empty($placeToLive)) {
            Flash::error('Place To Live not found');

            return redirect(route('placeToLives.index'));
        }

        return view('place_to_lives.show')->with('placeToLive', $placeToLive);
    }

    /**
     * Show the form for editing the specified PlaceToLive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $placeToLive = $this->placeToLiveRepository->find($id);

        if (empty($placeToLive)) {
            Flash::error('Place To Live not found');

            return redirect(route('placeToLives.index'));
        }

        return view('place_to_lives.edit')->with('placeToLive', $placeToLive);
    }

    /**
     * Update the specified PlaceToLive in storage.
     *
     * @param  int              $id
     * @param UpdatePlaceToLiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlaceToLiveRequest $request)
    {
        $placeToLive = $this->placeToLiveRepository->find($id);

        if (empty($placeToLive)) {
            Flash::error('Place To Live not found');

            return redirect(route('placeToLives.index'));
        }

        $placeToLive = $this->placeToLiveRepository->update($request->all(), $id);

        Flash::success('Place To Live updated successfully.');

        return redirect(route('placeToLives.index'));
    }

    /**
     * Remove the specified PlaceToLive from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $placeToLive = $this->placeToLiveRepository->find($id);

        if (empty($placeToLive)) {
            Flash::error('Place To Live not found');

            return redirect(route('placeToLives.index'));
        }

        $this->placeToLiveRepository->delete($id);

        Flash::success('Place To Live deleted successfully.');

        return redirect(route('placeToLives.index'));
    }
}

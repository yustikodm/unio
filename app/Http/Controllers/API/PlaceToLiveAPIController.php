<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlaceToLiveAPIRequest;
use App\Http\Requests\API\UpdatePlaceToLiveAPIRequest;
use App\Models\PlaceToLive;
use App\Repositories\PlaceToLiveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PlaceToLiveResource;
use Response;

/**
 * Class PlaceToLiveController
 * @package App\Http\Controllers\API
 */

class PlaceToLiveAPIController extends AppBaseController
{
  /** @var  PlaceToLiveRepository */
  private $placeToLiveRepository;

  public function __construct(PlaceToLiveRepository $placeToLiveRepo)
  {
    $this->placeToLiveRepository = $placeToLiveRepo;
  }

  /**
   * Display a listing of the PlaceToLive.
   * GET|HEAD /placeToLives
   *
   * @return Response
   */
  public function index()
  {
    $placeToLives = $this->placeToLiveRepository->paginate(15);

    return $this->sendResponse($placeToLives, 'Place To Lives retrieved successfully');
  }

  /**
   * Store a newly created PlaceToLive in storage.
   * POST /placeToLives
   *
   * @param CreatePlaceToLiveAPIRequest $request
   *
   * @return Response
   */
  public function store(CreatePlaceToLiveAPIRequest $request)
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

    return $this->sendResponse(new PlaceToLiveResource($placeToLive), 'Place To Live saved successfully');
  }

  /**
   * Display the specified PlaceToLive.
   * GET|HEAD /placeToLives/{id}
   *
   * @param int $id
   *
   * @return Response
   */
  public function show($id)
  {
    /** @var PlaceToLive $placeToLive */
    $placeToLive = $this->placeToLiveRepository->find($id);

    if (empty($placeToLive)) {
      return $this->sendError('Place To Live not found');
    }

    return $this->sendResponse(new PlaceToLiveResource($placeToLive), 'Place To Live retrieved successfully');
  }

  /**
   * Update the specified PlaceToLive in storage.
   * PUT/PATCH /placeToLives/{id}
   *
   * @param int $id
   * @param UpdatePlaceToLiveAPIRequest $request
   *
   * @return Response
   */
  public function update($id, UpdatePlaceToLiveAPIRequest $request)
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

    /** @var PlaceToLive $placeToLive */
    $placeToLive = $this->placeToLiveRepository->find($id);

    if (empty($placeToLive)) {
      return $this->sendError('Place To Live not found');
    }

    $placeToLive = $this->placeToLiveRepository->update($input, $id);

    return $this->sendResponse(new PlaceToLiveResource($placeToLive), 'PlaceToLive updated successfully');
  }

  /**
   * Remove the specified PlaceToLive from storage.
   * DELETE /placeToLives/{id}
   *
   * @param int $id
   *
   * @throws \Exception
   *
   * @return Response
   */
  public function destroy($id)
  {
    /** @var PlaceToLive $placeToLive */
    $placeToLive = $this->placeToLiveRepository->find($id);

    if (empty($placeToLive)) {
      return $this->sendError('Place To Live not found');
    }

    $placeToLive->delete();

    return $this->sendSuccess('Place To Live deleted successfully');
  }
}

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
use Illuminate\Support\Facades\DB;

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
  public function index(Request $request)
  {
    
    $placeToLives = PlaceToLive::query();

    if($request->name){
      $placeToLives->where('name','LIKE', "%$request->name%");
    }

    if($request->country){
      $placeToLives->where('country_id', $request->country);
    }

    if($request->state){
      $placeToLives->where('state_id', $request->state);
    }

    if($request->user_id){
        $user_id = $request->user_id;
        $placeToLives->leftJoin('wishlists', function ($join) use ($user_id) {                            
                        $join->on("wishlists.entity_id" , '=', DB::raw("place_to_live.id AND wishlists.entity_type = 'place_lives' AND wishlists.user_id = $user_id")); 
                    })->selectRaw("place_to_live.*, COALESCE(wishlists.id, '0') as is_checked");
    }else{
        $placeToLives->selectRaw("place_to_live.*, '0' as is_checked");
    }

    // $placeToLives = $this->placeToLiveRepository->paginate(15, ["*", "picture as header_src"], $search);

    return $this->sendResponse($placeToLives->paginate(15), 'Place To Lives retrieved successfully');
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
  public function show($id, Request $request)
  {
    /** @var PlaceToLive $placeToLive */
    $placeToLive = PlaceToLive::query()->where('place_to_live.id', $id);

    if($request->input('user_id')){
        $user_id = $request->input('user_id');
        $placeToLive->leftJoin('wishlists', function ($join) use ($user_id) {                            
                        $join->on("wishlists.entity_id" , '=', DB::raw("place_to_live.id AND wishlists.entity_type = 'place_lives' AND wishlists.user_id = $user_id")); 
                    })->selectRaw("place_to_live.*, COALESCE(wishlists.id, '0') as is_checked");
    }else{
        $placeToLive->selectRaw("place_to_live.*, '0' as is_checked");
    }

    $placeToLive = $placeToLive->first(); 

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
  public function update($id, Request $request)
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStateAPIRequest;
use App\Http\Requests\API\UpdateStateAPIRequest;
use App\Models\State;
use App\Repositories\StateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\StateResource;
use Response;

/**
 * Class StateController
 * @package App\Http\Controllers\API
 */

class StateAPIController extends AppBaseController
{
  /** @var  StateRepository */
  private $stateRepository;

  public function __construct(StateRepository $stateRepo)
  {
    $this->stateRepository = $stateRepo;
  }

  /**
   * Display a listing of the State.
   * GET|HEAD /states
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $search = [];

    if ($request->country_id) {
        $search = array_merge($search, [
            'country_id' => $request->country_id,    
        ]);
    }

    $states = $this->stateRepository->paginate(15, [], $search);

    return $this->sendResponse($states, 'States retrieved successfully');
  }

  public function all(Request $request)
  {
    $search = [];

    if ($request->country_id) {
        $search = array_merge($search, [
            'country_id' => $request->country_id,    
        ]);        
    }

    $states = State::where('country_id', $request->country_id)->get();

    return $this->sendResponse($states, 'States retrieved successfully');
  }

  /**
   * Store a newly created State in storage.
   * POST /states
   *
   * @param CreateStateAPIRequest $request
   *
   * @return Response
   */
  public function store(CreateStateAPIRequest $request)
  {
    $input = $request->only(['country_id', 'name']);

    $state = $this->stateRepository->create($input);

    return $this->sendResponse(new StateResource($state), 'State saved successfully');
  }

  /**
   * Display the specified State.
   * GET|HEAD /states/{id}
   *
   * @param int $id
   *
   * @return Response
   */
  public function show($id)
  {
    /** @var State $state */
    $state = $this->stateRepository->find($id);

    if (empty($state)) {
      return $this->sendError('State not found');
    }

    return $this->sendResponse(new StateResource($state), 'State retrieved successfully');
  }

  /**
   * Update the specified State in storage.
   * PUT/PATCH /states/{id}
   *
   * @param int $id
   * @param UpdateStateAPIRequest $request
   *
   * @return Response
   */
  public function update($id, UpdateStateAPIRequest $request)
  {
    $input = $request->only(['country_id', 'name']);

    /** @var State $state */
    $state = $this->stateRepository->find($id);

    if (empty($state)) {
      return $this->sendError('State not found');
    }

    $state = $this->stateRepository->update($input, $id);

    return $this->sendResponse(new StateResource($state), 'State updated successfully');
  }

  /**
   * Remove the specified State from storage.
   * DELETE /states/{id}
   *
   * @param int $id
   *
   * @throws \Exception
   *
   * @return Response
   */
  public function destroy($id)
  {
    /** @var State $state */
    $state = $this->stateRepository->find($id);

    if (empty($state)) {
      return $this->sendError('State not found');
    }

    $state->delete();

    return $this->sendSuccess('State deleted successfully');
  }
}

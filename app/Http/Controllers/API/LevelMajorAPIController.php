<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLevelMajorAPIRequest;
use App\Http\Requests\API\UpdateLevelMajorAPIRequest;
use App\Models\LevelMajor;
use App\Repositories\LevelMajorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LevelMajorResource;
use Response;

/**
 * Class LevelMajorController
 * @package App\Http\Controllers\API
 */

class LevelMajorAPIController extends AppBaseController
{
    /** @var  LevelMajorRepository */
    private $levelMajorRepository;

    public function __construct(LevelMajorRepository $levelMajorRepo)
    {
        $this->levelMajorRepository = $levelMajorRepo;
    }

    /**
     * Display a listing of the LevelMajor.
     * GET|HEAD /levelMajor
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $levelMajor = $this->levelMajorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(LevelMajorResource::collection($levelMajor), 'Level Major retrieved successfully');
    }

    /**
     * Store a newly created LevelMajor in storage.
     * POST /levelMajor
     *
     * @param CreateLevelMajorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelMajorAPIRequest $request)
    {
        $input = $request->all();

        $levelMajor = $this->levelMajorRepository->create($input);

        return $this->sendResponse(new LevelMajorResource($levelMajor), 'Level Major saved successfully');
    }

    /**
     * Display the specified LevelMajor.
     * GET|HEAD /levelMajor/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LevelMajor $levelMajor */
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            return $this->sendError('Level Major not found');
        }

        return $this->sendResponse(new LevelMajorResource($levelMajor), 'Level Major retrieved successfully');
    }

    /**
     * Update the specified LevelMajor in storage.
     * PUT/PATCH /levelMajor/{id}
     *
     * @param int $id
     * @param UpdateLevelMajorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelMajorAPIRequest $request)
    {
        $input = $request->all();

        /** @var LevelMajor $levelMajor */
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            return $this->sendError('Level Major not found');
        }

        $levelMajor = $this->levelMajorRepository->update($input, $id);

        return $this->sendResponse(new LevelMajorResource($levelMajor), 'LevelMajor updated successfully');
    }

    /**
     * Remove the specified LevelMajor from storage.
     * DELETE /levelMajor/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LevelMajor $levelMajor */
        $levelMajor = $this->levelMajorRepository->find($id);

        if (empty($levelMajor)) {
            return $this->sendError('Level Major not found');
        }

        $levelMajor->delete();

        return $this->sendSuccess('Level Major deleted successfully');
    }
}

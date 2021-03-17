<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLevelMitraAPIRequest;
use App\Http\Requests\API\UpdateLevelMitraAPIRequest;
use App\Models\LevelMitra;
use App\Repositories\LevelMitraRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LevelMitraController
 * @package App\Http\Controllers\API
 */

class LevelMitraAPIController extends AppBaseController
{
    /** @var  LevelMitraRepository */
    private $levelMitraRepository;

    public function __construct(LevelMitraRepository $levelMitraRepo)
    {
        $this->levelMitraRepository = $levelMitraRepo;
    }

    /**
     * Display a listing of the LevelMitra.
     * GET|HEAD /levelMitra
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $levelMitra = $this->levelMitraRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($levelMitra->toArray(), 'Level Mitra retrieved successfully');
    }

    /**
     * Store a newly created LevelMitra in storage.
     * POST /levelMitra
     *
     * @param CreateLevelMitraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelMitraAPIRequest $request)
    {
        $input = $request->all();

        $levelMitra = $this->levelMitraRepository->create($input);

        return $this->sendResponse($levelMitra->toArray(), 'Level Mitra saved successfully');
    }

    /**
     * Display the specified LevelMitra.
     * GET|HEAD /levelMitra/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LevelMitra $levelMitra */
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            return $this->sendError('Level Mitra not found');
        }

        return $this->sendResponse($levelMitra->toArray(), 'Level Mitra retrieved successfully');
    }

    /**
     * Update the specified LevelMitra in storage.
     * PUT/PATCH /levelMitra/{id}
     *
     * @param int $id
     * @param UpdateLevelMitraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelMitraAPIRequest $request)
    {
        $input = $request->all();

        /** @var LevelMitra $levelMitra */
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            return $this->sendError('Level Mitra not found');
        }

        $levelMitra = $this->levelMitraRepository->update($input, $id);

        return $this->sendResponse($levelMitra->toArray(), 'LevelMitra updated successfully');
    }

    /**
     * Remove the specified LevelMitra from storage.
     * DELETE /levelMitra/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LevelMitra $levelMitra */
        $levelMitra = $this->levelMitraRepository->find($id);

        if (empty($levelMitra)) {
            return $this->sendError('Level Mitra not found');
        }

        $levelMitra->delete();

        return $this->sendSuccess('Level Mitra deleted successfully');
    }
}

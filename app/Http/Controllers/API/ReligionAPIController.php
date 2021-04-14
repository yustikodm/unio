<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReligionAPIRequest;
use App\Http\Requests\API\UpdateReligionAPIRequest;
use App\Models\Religion;
use App\Repositories\ReligionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReligionResource;
use Response;

/**
 * Class ReligionController
 * @package App\Http\Controllers\API
 */

class ReligionAPIController extends AppBaseController
{
    /** @var  ReligionRepository */
    private $religionRepository;

    public function __construct(ReligionRepository $religionRepo)
    {
        $this->religionRepository = $religionRepo;
    }

    /**
     * Display a listing of the Religion.
     * GET|HEAD /religions
     *
     * @return Response
     */
    public function index()
    {
        $religions = $this->religionRepository->paginate(15);

        return $this->sendResponse($religions, 'Religions retrieved successfully');
    }

    /**
     * Store a newly created Religion in storage.
     * POST /religions
     *
     * @param CreateReligionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReligionAPIRequest $request)
    {
        $input = $request->only(['name']);

        $religion = $this->religionRepository->create($input);

        return $this->sendResponse(new ReligionResource($religion), 'Religion saved successfully');
    }

    /**
     * Display the specified Religion.
     * GET|HEAD /religions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Religion $religion */
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            return $this->sendError('Religion not found');
        }

        return $this->sendResponse(new ReligionResource($religion), 'Religion retrieved successfully');
    }

    /**
     * Update the specified Religion in storage.
     * PUT/PATCH /religions/{id}
     *
     * @param int $id
     * @param UpdateReligionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReligionAPIRequest $request)
    {
        $input = $request->only(['name']);

        /** @var Religion $religion */
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            return $this->sendError('Religion not found');
        }

        $religion = $this->religionRepository->update($input, $id);

        return $this->sendResponse(new ReligionResource($religion), 'Religion updated successfully');
    }

    /**
     * Remove the specified Religion from storage.
     * DELETE /religions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Religion $religion */
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            return $this->sendError('Religion not found');
        }

        $religion->delete();

        return $this->sendSuccess('Religion deleted successfully');
    }
}

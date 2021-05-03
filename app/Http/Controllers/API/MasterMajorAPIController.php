<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterMajorAPIRequest;
use App\Http\Requests\API\UpdateMasterMajorAPIRequest;
use App\Models\MasterMajor;
use App\Repositories\MasterMajorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MasterMajorResource;
use Response;

/**
 * Class MasterMajorController
 * @package App\Http\Controllers\API
 */

class MasterMajorAPIController extends AppBaseController
{
    /** @var  MasterMajorRepository */
    private $MasterMajorRepository;

    public function __construct(MasterMajorRepository $MasterMajorRepo)
    {
        $this->MasterMajorRepository = $MasterMajorRepo;
    }

    /**
     * Display a listing of the MasterMajor.
     * GET|HEAD /MasterMajors
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = [];


        $MasterMajors = $this->MasterMajorRepository->paginate(15, [], $search);

        return $this->sendResponse($MasterMajors, 'MasterMajors retrieved successfully');
    }

    /**
     * Store a newly created MasterMajor in storage.
     * POST /MasterMajors
     *
     * @param CreateMasterMajorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMajorAPIRequest $request)
    {
        $input = $request->all();

        $MasterMajor = $this->MasterMajorRepository->create($input);

        return $this->sendResponse(new MasterMajorResource($MasterMajor), 'MasterMajor saved successfully');
    }

    /**
     * Display the specified MasterMajor.
     * GET|HEAD /MasterMajors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MasterMajor $MasterMajor */
        $MasterMajor = $this->MasterMajorRepository->find($id);

        if (empty($MasterMajor)) {
            return $this->sendError('MasterMajor not found');
        }

        return $this->sendResponse(new MasterMajorResource($MasterMajor), 'MasterMajor retrieved successfully');
    }

    /**
     * Update the specified MasterMajor in storage.
     * PUT/PATCH /MasterMajors/{id}
     *
     * @param int $id
     * @param UpdateMasterMajorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMajorAPIRequest $request)
    {
        $input = $request->only(['state_id', 'name']);

        /** @var MasterMajor $MasterMajor */
        $MasterMajor = $this->MasterMajorRepository->find($id);

        if (empty($MasterMajor)) {
            return $this->sendError('MasterMajor not found');
        }

        $MasterMajor = $this->MasterMajorRepository->update($input, $id);

        return $this->sendResponse(new MasterMajorResource($MasterMajor), 'MasterMajor updated successfully');
    }

    /**
     * Remove the specified MasterMajor from storage.
     * DELETE /MasterMajors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MasterMajor $MasterMajor */
        $MasterMajor = $this->MasterMajorRepository->find($id);

        if (empty($MasterMajor)) {
            return $this->sendError('MasterMajor not found');
        }

        $MasterMajor->delete();

        return $this->sendSuccess('MasterMajor deleted successfully');
    }
}

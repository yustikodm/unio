<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGuardianAPIRequest;
use App\Http\Requests\API\UpdateGuardianAPIRequest;
use App\Models\Guardian;
use App\Repositories\GuardianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\GuardianResource;
use Response;

/**
 * Class GuardianController
 * @package App\Http\Controllers\API
 */

class GuardianAPIController extends AppBaseController
{
    /** @var  GuardianRepository */
    private $guardianRepository;

    public function __construct(GuardianRepository $guardianRepo)
    {
        $this->guardianRepository = $guardianRepo;
    }

    /**
     * Display a listing of the Guardian.
     * GET|HEAD /guardians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $guardians = $this->guardianRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(GuardianResource::collection($guardians), 'Guardians retrieved successfully');
    }

    /**
     * Store a newly created Guardian in storage.
     * POST /guardians
     *
     * @param CreateGuardianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGuardianAPIRequest $request)
    {
        $input = $request->all();

        $guardian = $this->guardianRepository->create($input);

        return $this->sendResponse(new GuardianResource($guardian), 'Guardian saved successfully');
    }

    /**
     * Display the specified Guardian.
     * GET|HEAD /guardians/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Guardian $guardian */
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            return $this->sendError('Guardian not found');
        }

        return $this->sendResponse(new GuardianResource($guardian), 'Guardian retrieved successfully');
    }

    /**
     * Update the specified Guardian in storage.
     * PUT/PATCH /guardians/{id}
     *
     * @param int $id
     * @param UpdateGuardianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGuardianAPIRequest $request)
    {
        $input = $request->all();

        /** @var Guardian $guardian */
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            return $this->sendError('Guardian not found');
        }

        $guardian = $this->guardianRepository->update($input, $id);

        return $this->sendResponse(new GuardianResource($guardian), 'Guardian updated successfully');
    }

    /**
     * Remove the specified Guardian from storage.
     * DELETE /guardians/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Guardian $guardian */
        $guardian = $this->guardianRepository->find($id);

        if (empty($guardian)) {
            return $this->sendError('Guardian not found');
        }

        $guardian->delete();

        return $this->sendSuccess('Guardian deleted successfully');
    }
}

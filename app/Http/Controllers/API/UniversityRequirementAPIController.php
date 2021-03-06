<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityRequirementAPIRequest;
use App\Http\Requests\API\UpdateUniversityRequirementAPIRequest;
use App\Models\UniversityRequirement;
use App\Repositories\UniversityRequirementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityRequirementResource;
use Response;

/**
 * Class UniversityRequirementController
 * @package App\Http\Controllers\API
 */

class UniversityRequirementAPIController extends AppBaseController
{
    /** @var  UniversityRequirementRepository */
    private $universityRequirementRepository;

    public function __construct(UniversityRequirementRepository $universityRequirementRepo)
    {
        $this->universityRequirementRepository = $universityRequirementRepo;
    }

    /**
     * Display a listing of the UniversityRequirement.
     * GET|HEAD /universityRequirements
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = [];

        if ($request->university_id) {
            $search = array_merge($search, [
                'university_id' => $request->university_id,    
            ]);
        }

        $universityRequirements = $this->universityRequirementRepository->paginate(15, [], $search);

        return $this->sendResponse($universityRequirements, 'University Requirements retrieved successfully');
    }

    /**
     * Store a newly created UniversityRequirement in storage.
     * POST /universityRequirements
     *
     * @param CreateUniversityRequirementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityRequirementAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'major_id',
            'name',
            'value',
            'description'
        ]);

        $universityRequirement = $this->universityRequirementRepository->create($input);

        return $this->sendResponse(new UniversityRequirementResource($universityRequirement), 'University Requirement saved successfully');
    }

    /**
     * Display the specified UniversityRequirement.
     * GET|HEAD /universityRequirements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityRequirement $universityRequirement */
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            return $this->sendError('University Requirement not found');
        }

        return $this->sendResponse(new UniversityRequirementResource($universityRequirement), 'University Requirement retrieved successfully');
    }

    /**
     * Update the specified UniversityRequirement in storage.
     * PUT/PATCH /universityRequirements/{id}
     *
     * @param int $id
     * @param UpdateUniversityRequirementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityRequirementAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'major_id',
            'name',
            'value',
            'description'
        ]);

        /** @var UniversityRequirement $universityRequirement */
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            return $this->sendError('University Requirement not found');
        }

        $universityRequirement = $this->universityRequirementRepository->update($input, $id);

        return $this->sendResponse(new UniversityRequirementResource($universityRequirement), 'UniversityRequirement updated successfully');
    }

    /**
     * Remove the specified UniversityRequirement from storage.
     * DELETE /universityRequirements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityRequirement $universityRequirement */
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            return $this->sendError('University Requirement not found');
        }

        $universityRequirement->delete();

        return $this->sendSuccess('University Requirement deleted successfully');
    }
}

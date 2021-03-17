<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityScholarshipAPIRequest;
use App\Http\Requests\API\UpdateUniversityScholarshipAPIRequest;
use App\Models\UniversityScholarship;
use App\Repositories\UniversityScholarshipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityScholarshipResource;
use Response;

/**
 * Class UniversityScholarshipController
 * @package App\Http\Controllers\API
 */

class UniversityScholarshipAPIController extends AppBaseController
{
    /** @var  UniversityScholarshipRepository */
    private $universityScholarshipRepository;

    public function __construct(UniversityScholarshipRepository $universityScholarshipRepo)
    {
        $this->universityScholarshipRepository = $universityScholarshipRepo;
    }

    /**
     * Display a listing of the UniversityScholarship.
     * GET|HEAD /universityScholarships
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $universityScholarships = $this->universityScholarshipRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UniversityScholarshipResource::collection($universityScholarships), 'University Scholarships retrieved successfully');
    }

    /**
     * Store a newly created UniversityScholarship in storage.
     * POST /universityScholarships
     *
     * @param CreateUniversityScholarshipAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityScholarshipAPIRequest $request)
    {
        $input = $request->all();

        $universityScholarship = $this->universityScholarshipRepository->create($input);

        return $this->sendResponse(new UniversityScholarshipResource($universityScholarship), 'University Scholarship saved successfully');
    }

    /**
     * Display the specified UniversityScholarship.
     * GET|HEAD /universityScholarships/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityScholarship $universityScholarship */
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            return $this->sendError('University Scholarship not found');
        }

        return $this->sendResponse(new UniversityScholarshipResource($universityScholarship), 'University Scholarship retrieved successfully');
    }

    /**
     * Update the specified UniversityScholarship in storage.
     * PUT/PATCH /universityScholarships/{id}
     *
     * @param int $id
     * @param UpdateUniversityScholarshipAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityScholarshipAPIRequest $request)
    {
        $input = $request->all();

        /** @var UniversityScholarship $universityScholarship */
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            return $this->sendError('University Scholarship not found');
        }

        $universityScholarship = $this->universityScholarshipRepository->update($input, $id);

        return $this->sendResponse(new UniversityScholarshipResource($universityScholarship), 'UniversityScholarship updated successfully');
    }

    /**
     * Remove the specified UniversityScholarship from storage.
     * DELETE /universityScholarships/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityScholarship $universityScholarship */
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            return $this->sendError('University Scholarship not found');
        }

        $universityScholarship->delete();

        return $this->sendSuccess('University Scholarship deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityMajorAPIRequest;
use App\Http\Requests\API\UpdateUniversityMajorAPIRequest;
use App\Models\UniversityMajor;
use App\Repositories\UniversityMajorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityMajorResource;
use Response;

/**
 * Class UniversityMajorController
 * @package App\Http\Controllers\API
 */

class UniversityMajorAPIController extends AppBaseController
{
    /** @var  UniversityMajorRepository */
    private $universityMajorRepository;

    public function __construct(UniversityMajorRepository $universityMajorRepo)
    {
        $this->universityMajorRepository = $universityMajorRepo;
    }

    /**
     * Display a listing of the UniversityMajor.
     * GET|HEAD /universityMajors
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $universityMajors = $this->universityMajorRepository->paginate(15, [], ['name' => $request->name]);

        return $this->sendResponse($universityMajors, 'University Majors retrieved successfully');
    }

    /**
     * Store a newly created UniversityMajor in storage.
     * POST /universityMajors
     *
     * @param CreateUniversityMajorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityMajorAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'faculty_id',
            'name',
            'description',
            'accreditation',
            'level'
        ]);

        $universityMajor = $this->universityMajorRepository->create($input);

        return $this->sendResponse(new UniversityMajorResource($universityMajor), 'University Major saved successfully');
    }

    /**
     * Display the specified UniversityMajor.
     * GET|HEAD /universityMajors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityMajor $universityMajor */
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            return $this->sendError('University Major not found');
        }

        return $this->sendResponse(new UniversityMajorResource($universityMajor), 'University Major retrieved successfully');
    }

    /**
     * Update the specified UniversityMajor in storage.
     * PUT/PATCH /universityMajors/{id}
     *
     * @param int $id
     * @param UpdateUniversityMajorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityMajorAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'faculty_id',
            'name',
            'description',
            'accreditation',
            'level'
        ]);

        /** @var UniversityMajor $universityMajor */
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            return $this->sendError('University Major not found');
        }

        $universityMajor = $this->universityMajorRepository->update($input, $id);

        return $this->sendResponse(new UniversityMajorResource($universityMajor), 'UniversityMajor updated successfully');
    }

    /**
     * Remove the specified UniversityMajor from storage.
     * DELETE /universityMajors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityMajor $universityMajor */
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            return $this->sendError('University Major not found');
        }

        $universityMajor->delete();

        return $this->sendSuccess('University Major deleted successfully');
    }
}

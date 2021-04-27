<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityAPIRequest;
use App\Http\Requests\API\UpdateUniversityAPIRequest;
use App\Models\University;
use App\Repositories\UniversityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityResource;
use Response;

/**
 * Class UniversityController
 * @package App\Http\Controllers\API
 */

class UniversityAPIController extends AppBaseController
{
    /** @var  UniversityRepository */
    private $universityRepository;

    public function __construct(UniversityRepository $universityRepo)
    {
        $this->universityRepository = $universityRepo;
    }

    /**
     * Display a listing of the University.
     * GET|HEAD /universities
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = [
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
        ];

        $universities = $this->universityRepository->paginate(15, [], $search);
        // $universities = University::paginate(15);
        return $this->sendResponse($universities, 'Universities retrieved successfully');
    }

    /**
     * Store a newly created University in storage.
     * POST /universities
     *
     * @param CreateUniversityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'name',
            'description',
            'logo_src',
            'type',
            'accreditation',
            'address'
        ]);

        $university = $this->universityRepository->create($input);

        return $this->sendResponse(new UniversityResource($university), 'University saved successfully');
    }

    /**
     * Display the specified University.
     * GET|HEAD /universities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var University $university */
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            return $this->sendError('University not found');
        }

        return $this->sendResponse(new UniversityResource($university), 'University retrieved successfully');
    }

    /**
     * Update the specified University in storage.
     * PUT/PATCH /universities/{id}
     *
     * @param int $id
     * @param UpdateUniversityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'name',
            'description',
            'logo_src',
            'type',
            'accreditation',
            'address'
        ]);

        /** @var University $university */
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            return $this->sendError('University not found');
        }

        $university = $this->universityRepository->update($input, $id);

        return $this->sendResponse(new UniversityResource($university), 'University updated successfully');
    }

    /**
     * Remove the specified University from storage.
     * DELETE /universities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var University $university */
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            return $this->sendError('University not found');
        }

        $university->delete();

        return $this->sendSuccess('University deleted successfully');
    }
}

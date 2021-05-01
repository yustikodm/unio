<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityFacilitiyAPIRequest;
use App\Http\Requests\API\UpdateUniversityFacilitiyAPIRequest;
use App\Models\UniversityFacilitiy;
use App\Repositories\UniversityFacilityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityFacilityResource;
use Response;

/**
 * Class UniversityFacilitiyController
 * @package App\Http\Controllers\API
 */

class UniversityFacilitiesAPIController extends AppBaseController
{
    /** @var  UniversityFacilityRepository */
    private $universityFacilityRepository;

    public function __construct(UniversityFacilityRepository $universityFacilitiyRepo)
    {
        $this->universityFacilityRepository = $universityFacilitiyRepo;
    }

    /**
     * Display a listing of the UniversityFacilitiy.
     * GET|HEAD /universityFacilitiy
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

        $universityFacilitiy = $this->universityFacilityRepository->paginate(15, [], $search);

        return $this->sendResponse($universityFacilitiy, 'University Facilitiy retrieved successfully');
    }

    /**
     * Store a newly created UniversityFacilitiy in storage.
     * POST /universityFacilitiy
     *
     * @param CreateUniversityFacilitiyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityFacilitiyAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'name',
            'description'
        ]);

        $universityFacilitiy = $this->universityFacilityRepository->create($input);

        return $this->sendResponse(new UniversityFacilityResource($universityFacilitiy), 'University Facilitiy saved successfully');
    }

    /**
     * Display the specified UniversityFacilitiy.
     * GET|HEAD /universityFacilitiy/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityFacilitiy $universityFacilitiy */
        $universityFacilitiy = $this->universityFacilityRepository->find($id);

        if (empty($universityFacilitiy)) {
            return $this->sendError('University Facilitiy not found');
        }

        return $this->sendResponse(new UniversityFacilityResource($universityFacilitiy), 'University Facilitiy retrieved successfully');
    }

    /**
     * Update the specified UniversityFacilitiy in storage.
     * PUT/PATCH /universityFacilitiy/{id}
     *
     * @param int $id
     * @param UpdateUniversityFacilitiyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityFacilitiyAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'name',
            'description'
        ]);

        /** @var UniversityFacilitiy $universityFacilitiy */
        $universityFacilitiy = $this->universityFacilityRepository->find($id);

        if (empty($universityFacilitiy)) {
            return $this->sendError('University Facilitiy not found');
        }

        $universityFacilitiy = $this->universityFacilityRepository->update($input, $id);

        return $this->sendResponse(new UniversityFacilityResource($universityFacilitiy), 'UniversityFacilitiy updated successfully');
    }

    /**
     * Remove the specified UniversityFacilitiy from storage.
     * DELETE /universityFacilitiy/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityFacilitiy $universityFacilitiy */
        $universityFacilitiy = $this->universityFacilityRepository->find($id);

        if (empty($universityFacilitiy)) {
            return $this->sendError('University Facilitiy not found');
        }

        $universityFacilitiy->delete();

        return $this->sendSuccess('University Facilitiy deleted successfully');
    }
}

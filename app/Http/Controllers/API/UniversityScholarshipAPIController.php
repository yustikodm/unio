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

        if($request->name){
            $universityScholarships = UniversityScholarship::query()->where('name','LIKE', "%$request->name%")->paginate(15);
        }else{
            $universityScholarships = UniversityScholarship::query()->paginate(15);
        }    


        // $universityScholarships = $this->universityScholarshipRepository->paginate(15, [], $search);

        return $this->sendResponse($universityScholarships, 'University Scholarships retrieved successfully');
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
        $input = $request->only([
            'university_id',
            'name',
            'description',
            'picture',
            'year'
        ]);

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
        $input = $request->only([
            'university_id',
            'name',
            'description',
            'picture',
            'year'
        ]);

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

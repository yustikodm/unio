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
use Illuminate\Support\Facades\DB;

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
        $universityScholarships = UniversityScholarship::query()->join('universities', 'universities.id', '=', 'university_scholarships.university_id')->select('university_scholarships.*'); 

        if($request->name){
            $universityScholarships->where('university_scholarships.name','LIKE', "%$request->name%");
        }

        if($request->country){
            $universityScholarships->where('universities.country_id', $request->country);
        }

        if($request->state){
            $universityScholarships->where('universities.state_id', $request->state);
        }

        if($request->user_id){
            $user_id = $request->user_id;
            $universityScholarships->leftJoin('wishlists', function ($join) use ($user_id) {                            
                            $join->on("wishlists.entity_id" , '=', DB::raw("university_scholarships.id AND wishlists.entity_type = 'scholarships' AND wishlists.user_id = $user_id")); 
                        })->selectRaw("university_scholarships.*, COALESCE(wishlists.id, '0') as is_checked");
        }else{
            $universityScholarships->selectRaw("university_scholarships.*, '0' as is_checked");
        }

        // $universityScholarships = $this->universityScholarshipRepository->paginate(15, [], $search);

        return $this->sendResponse($universityScholarships->paginate(15), 'University Scholarships retrieved successfully');
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
    public function show($id, Request $request)
    {
        /** @var UniversityScholarship $universityScholarship */
        $universityScholarship = UniversityScholarship::query()->where('university_scholarships.id', $id);

        if($request->input('user_id')){
            $user_id = $request->input('user_id');
            $universityScholarship->leftJoin('wishlists', function ($join) use ($user_id) {                            
                            $join->on("wishlists.entity_id" , '=', DB::raw("university_scholarships.id AND wishlists.entity_type = 'scholarships' AND wishlists.user_id = $user_id")); 
                        })->selectRaw("university_scholarships.*, COALESCE(wishlists.id, '0') as is_checked");
        }else{
            $universityScholarship->selectRaw("university_scholarships.*, '0' as is_checked");
        }

        $universityScholarship = $universityScholarship->first();

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

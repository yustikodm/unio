<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityFeeAPIRequest;
use App\Http\Requests\API\UpdateUniversityFeeAPIRequest;
use App\Models\UniversityFee;
use App\Repositories\UniversityFeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityFeeResource;
use Response;

/**
 * Class UniversityFeeController
 * @package App\Http\Controllers\API
 */

class UniversityFeeAPIController extends AppBaseController
{
    /** @var  UniversityFeeRepository */
    private $universityFeeRepository;

    public function __construct(UniversityFeeRepository $universityFeeRepo)
    {
        $this->universityFeeRepository = $universityFeeRepo;
    }

    /**
     * Display a listing of the UniversityFee.
     * GET|HEAD /universityFees
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = [];

        // if ($request->university_id) {
        //     $search = array_merge($search, [
        //         'university_id' => $request->university_id,    
        //     ]);
        // }
        // if ($request->faculty_id) {
        //     $search = array_merge($search, [    
        //         'faculty_id' => $request->faculty_id,    
        //     ]);
        // }
        if ($request->major_id) {
            $search = array_merge($search, [                
                'major_id' => $request->major_id,
            ]);
        }

        $universityFees = $this->universityFeeRepository->paginate(15, [], $search);

        return $this->sendResponse($universityFees, 'University Fees retrieved successfully');
    }

    /**
     * Store a newly created UniversityFee in storage.
     * POST /universityFees
     *
     * @param CreateUniversityFeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityFeeAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'faculty_id',
            'major_id',
            'type',
            'admission_fee',
            'semester_fee',
            'description'
        ]);

        $universityFee = $this->universityFeeRepository->create($input);

        return $this->sendResponse(new UniversityFeeResource($universityFee), 'University Fee saved successfully');
    }

    /**
     * Display the specified UniversityFee.
     * GET|HEAD /universityFees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityFee $universityFee */
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            return $this->sendError('University Fee not found');
        }

        return $this->sendResponse(new UniversityFeeResource($universityFee), 'University Fee retrieved successfully');
    }

    /**
     * Update the specified UniversityFee in storage.
     * PUT/PATCH /universityFees/{id}
     *
     * @param int $id
     * @param UpdateUniversityFeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityFeeAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'faculty_id',
            'major_id',
            'type',
            'admission_fee',
            'semester_fee',
            'description'
        ]);

        /** @var UniversityFee $universityFee */
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            return $this->sendError('University Fee not found');
        }

        $universityFee = $this->universityFeeRepository->update($input, $id);

        return $this->sendResponse(new UniversityFeeResource($universityFee), 'UniversityFee updated successfully');
    }

    /**
     * Remove the specified UniversityFee from storage.
     * DELETE /universityFees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityFee $universityFee */
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            return $this->sendError('University Fee not found');
        }

        $universityFee->delete();

        return $this->sendSuccess('University Fee deleted successfully');
    }
}

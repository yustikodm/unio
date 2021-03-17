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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $universityFees = $this->universityFeeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UniversityFeeResource::collection($universityFees), 'University Fees retrieved successfully');
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
        $input = $request->all();

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
        $input = $request->all();

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

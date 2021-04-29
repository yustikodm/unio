<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePointLogAPIRequest;
use App\Http\Requests\API\UpdatePointLogAPIRequest;
use App\Models\PointLog;
use App\Repositories\PointLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PointLogResource;
use App\Repositories\FamilyRepository;

/**
 * Class PointLogController
 * @package App\Http\Controllers\API
 */

class PointLogAPIController extends AppBaseController
{
    /** @var  PointLogRepository */
    private $pointLogRepository;

    /** @var  FamilyRepository */
    private $familyRepository;

    public function __construct(PointLogRepository $pointLogRepo, FamilyRepository $familyRepo)
    {
        $this->pointLogRepository = $pointLogRepo;

        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the PointLog.
     * GET|HEAD /pointLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pointLogs = $this->pointLogRepository->paginate(15);

        return $this->sendResponse($pointLogs, 'Point Logs retrieved successfully');    
    }

    /**
     * Store a newly created PointLog in storage.
     * POST /pointLogs
     *
     * @param CreatePointLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePointLogAPIRequest $request)
    {
        $input = $request->only([
            'user_id',
            'transaction_id',
            'transaction_type',
            'point_before',
            'point_amount',
            'point_after'
        ]);

        $pointLog = $this->pointLogRepository->create($input);

        return $this->sendResponse(new PointLogResource($pointLog), 'Point Log saved successfully');
    }

    /**
     * Display the specified PointLog.
     * GET|HEAD /pointLogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PointLog $pointLog */
        $pointLog = $this->pointLogRepository->find($id);

        if (empty($pointLog)) {
            return $this->sendError('Point Log not found');
        }

        return $this->sendResponse(new PointLogResource($pointLog), 'Point Log retrieved successfully');
    }

    public function familyPoint($userId)
    {
        $family = $this->familyRepository->getByUserId($userId);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $point = $this->pointLogRepository->getFamilyPoint($family->parent_user);

        return $this->sendResponse(new PointLogResource($point), 'Family point retrieved successfully');
    }
}

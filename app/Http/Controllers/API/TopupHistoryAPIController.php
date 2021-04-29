<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTopupHistoryAPIRequest;
use App\Http\Requests\API\UpdateTopupHistoryAPIRequest;
use App\Models\TopupHistory;
use App\Repositories\TopupHistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TopupHistoryResource;
use Response;

/**
 * Class TopupHistoryController
 * @package App\Http\Controllers\API
 */

class TopupHistoryAPIController extends AppBaseController
{
    /** @var  TopupHistoryRepository */
    private $topupHistoryRepository;

    public function __construct(TopupHistoryRepository $topupHistoryRepo)
    {
        $this->topupHistoryRepository = $topupHistoryRepo;
    }

    /**
     * Display a listing of the TopupHistory.
     * GET|HEAD /topupHistories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $topupHistories = $this->topupHistoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TopupHistoryResource::collection($topupHistories), 'Topup Histories retrieved successfully');
    }

    /**
     * Store a newly created TopupHistory in storage.
     * POST /topupHistories
     *
     * @param CreateTopupHistoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTopupHistoryAPIRequest $request)
    {
        $input = $request->only([
            'user_id',
            'country_id',
            'package_id',
            'code',
            'amount',
        ]);

        $topupHistory = $this->topupHistoryRepository->create($input);

        return $this->sendResponse(new TopupHistoryResource($topupHistory), 'Topup History saved successfully');
    }

    /**
     * Display the specified TopupHistory.
     * GET|HEAD /topupHistories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TopupHistory $topupHistory */
        $topupHistory = $this->topupHistoryRepository->find($id);

        if (empty($topupHistory)) {
            return $this->sendError('Topup History not found');
        }

        return $this->sendResponse(new TopupHistoryResource($topupHistory), 'Topup History retrieved successfully');
    }

    /**
     * Update the specified TopupHistory in storage.
     * PUT/PATCH /topupHistories/{id}
     *
     * @param int $id
     * @param UpdateTopupHistoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopupHistoryAPIRequest $request)
    {
        $input = $request->only([
            'user_id',
            'country_id',
            'package_id',
            'code',
            'amount',
        ]);

        /** @var TopupHistory $topupHistory */
        $topupHistory = $this->topupHistoryRepository->find($id);

        if (empty($topupHistory)) {
            return $this->sendError('Topup History not found');
        }

        $topupHistory = $this->topupHistoryRepository->update($input, $id);

        return $this->sendResponse(new TopupHistoryResource($topupHistory), 'TopupHistory updated successfully');
    }

    /**
     * Remove the specified TopupHistory from storage.
     * DELETE /topupHistories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TopupHistory $topupHistory */
        $topupHistory = $this->topupHistoryRepository->find($id);

        if (empty($topupHistory)) {
            return $this->sendError('Topup History not found');
        }

        $topupHistory->delete();

        return $this->sendSuccess('Topup History deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMajorPredictionAPIRequest;
use App\Http\Requests\API\UpdateMajorPredictionAPIRequest;
use App\Models\MajorPrediction;
use App\Repositories\MajorPredictionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MajorPredictionResource;
use Response;

/**
 * Class MajorPredictionController
 * @package App\Http\Controllers\API
 */

class MajorPredictionAPIController extends AppBaseController
{
    /** @var  MajorPredictionRepository */
    private $majorPredictionRepository;

    public function __construct(MajorPredictionRepository $majorPredictionRepo)
    {
        $this->majorPredictionRepository = $majorPredictionRepo;
    }

    /**
     * Display a listing of the MajorPrediction.
     * GET|HEAD /majorPrediction
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $majorPrediction = $this->majorPredictionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MajorPredictionResource::collection($majorPrediction), 'Major Prediction retrieved successfully');
    }

    /**
     * Store a newly created MajorPrediction in storage.
     * POST /majorPrediction
     *
     * @param CreateMajorPredictionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMajorPredictionAPIRequest $request)
    {
        $input = $request->all();

        $majorPrediction = $this->majorPredictionRepository->create($input);

        return $this->sendResponse(new MajorPredictionResource($majorPrediction), 'Major Prediction saved successfully');
    }

    /**
     * Display the specified MajorPrediction.
     * GET|HEAD /majorPrediction/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MajorPrediction $majorPrediction */
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            return $this->sendError('Major Prediction not found');
        }

        return $this->sendResponse(new MajorPredictionResource($majorPrediction), 'Major Prediction retrieved successfully');
    }

    /**
     * Update the specified MajorPrediction in storage.
     * PUT/PATCH /majorPrediction/{id}
     *
     * @param int $id
     * @param UpdateMajorPredictionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMajorPredictionAPIRequest $request)
    {
        $input = $request->all();

        /** @var MajorPrediction $majorPrediction */
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            return $this->sendError('Major Prediction not found');
        }

        $majorPrediction = $this->majorPredictionRepository->update($input, $id);

        return $this->sendResponse(new MajorPredictionResource($majorPrediction), 'MajorPrediction updated successfully');
    }

    /**
     * Remove the specified MajorPrediction from storage.
     * DELETE /majorPrediction/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MajorPrediction $majorPrediction */
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            return $this->sendError('Major Prediction not found');
        }

        $majorPrediction->delete();

        return $this->sendSuccess('Major Prediction deleted successfully');
    }
}

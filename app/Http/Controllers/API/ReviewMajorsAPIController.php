<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReviewMajorsAPIRequest;
use App\Http\Requests\API\UpdateReviewMajorsAPIRequest;
use App\Models\ReviewMajors;
use App\Repositories\ReviewMajorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReviewMajorsResource;
use Response;

/**
 * Class ReviewMajorsController
 * @package App\Http\Controllers\API
 */

class ReviewMajorsAPIController extends AppBaseController
{
    /** @var  ReviewMajorsRepository */
    private $reviewMajorsRepository;

    public function __construct(ReviewMajorsRepository $reviewMajorsRepo)
    {
        $this->reviewMajorsRepository = $reviewMajorsRepo;
    }

    /**
     * Display a listing of the ReviewMajors.
     * GET|HEAD /reviewMajors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $reviewMajors = $this->reviewMajorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReviewMajorsResource::collection($reviewMajors), 'Review Majors retrieved successfully');
    }

    /**
     * Store a newly created ReviewMajors in storage.
     * POST /reviewMajors
     *
     * @param CreateReviewMajorsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReviewMajorsAPIRequest $request)
    {
        $input = $request->all();

        $reviewMajors = $this->reviewMajorsRepository->create($input);

        return $this->sendResponse(new ReviewMajorsResource($reviewMajors), 'Review Majors saved successfully');
    }

    /**
     * Display the specified ReviewMajors.
     * GET|HEAD /reviewMajors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ReviewMajors $reviewMajors */
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            return $this->sendError('Review Majors not found');
        }

        return $this->sendResponse(new ReviewMajorsResource($reviewMajors), 'Review Majors retrieved successfully');
    }

    /**
     * Update the specified ReviewMajors in storage.
     * PUT/PATCH /reviewMajors/{id}
     *
     * @param int $id
     * @param UpdateReviewMajorsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReviewMajorsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReviewMajors $reviewMajors */
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            return $this->sendError('Review Majors not found');
        }

        $reviewMajors = $this->reviewMajorsRepository->update($input, $id);

        return $this->sendResponse(new ReviewMajorsResource($reviewMajors), 'ReviewMajors updated successfully');
    }

    /**
     * Remove the specified ReviewMajors from storage.
     * DELETE /reviewMajors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ReviewMajors $reviewMajors */
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            return $this->sendError('Review Majors not found');
        }

        $reviewMajors->delete();

        return $this->sendSuccess('Review Majors deleted successfully');
    }
}

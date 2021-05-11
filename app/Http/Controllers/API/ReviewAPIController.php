<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReviewAPIRequest;
use App\Http\Requests\API\UpdateReviewAPIRequest;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReviewResource;
use Response;

/**
 * Class ReviewController
 * @package App\Http\Controllers\API
 */

class ReviewAPIController extends AppBaseController
{
    /** @var  ReviewRepository */
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepo)
    {
        $this->reviewRepository = $reviewRepo;
    }

    /**
     * Display a listing of the Review.
     * GET|HEAD /review
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $review = $this->reviewRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );

        $review = Review::query()->join('users', 'users.id', '=', "review.user_id")
                                ->join('biodata', 'biodata.user_id', '=', "users.id")
                                ->where('entity_name', $request->input('entity_name'))
                                ->where('entity_id', $request->input('entity_id'))                                
                                ->get();

        // return $this->sendResponse(ReviewResource::collection($review), 'Review retrieved successfully');
        return $this->sendResponse($review, 'Review retrieved successfully');
    }

    /**
     * Store a newly created Review in storage.
     * POST /review
     *
     * @param CreateReviewAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReviewAPIRequest $request)
    {
        $input = $request->only([
            "user_id",
            "entity_id",
            "entity_name",
            "message",
            "rating"
        ]);

        $review = $this->reviewRepository->create($input);

        return $this->sendResponse(new ReviewResource($review), 'Review saved successfully');
    }

    /**
     * Display the specified Review.
     * GET|HEAD /review/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Review $review */
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            return $this->sendError('Review not found');
        }

        return $this->sendResponse(new ReviewResource($review), 'Review retrieved successfully');
    }

    /**
     * Update the specified Review in storage.
     * PUT/PATCH /review/{id}
     *
     * @param int $id
     * @param UpdateReviewAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReviewAPIRequest $request)
    {
        $input = $request->all();

        /** @var Review $review */
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            return $this->sendError('Review not found');
        }

        $review = $this->reviewRepository->update($input, $id);

        return $this->sendResponse(new ReviewResource($review), 'Review updated successfully');
    }

    /**
     * Remove the specified Review from storage.
     * DELETE /review/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Review $review */
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            return $this->sendError('Review not found');
        }

        $review->delete();

        return $this->sendSuccess('Review deleted successfully');
    }
}

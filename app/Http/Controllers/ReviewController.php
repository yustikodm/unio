<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Repositories\ReviewRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReviewController extends AppBaseController
{
    /** @var  ReviewRepository */
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepo)
    {
        $this->reviewRepository = $reviewRepo;
    }

    /**
     * Display a listing of the Review.
     *
     * @param ReviewDataTable $reviewDataTable
     * @return Response
     */
    public function index(ReviewDataTable $reviewDataTable)
    {
        return $reviewDataTable->render('review.index');
    }

    /**
     * Show the form for creating a new Review.
     *
     * @return Response
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created Review in storage.
     *
     * @param CreateReviewRequest $request
     *
     * @return Response
     */
    public function store(CreateReviewRequest $request)
    {
        $input = $request->all();

        $review = $this->reviewRepository->create($input);

        Flash::success('Review saved successfully.');

        return redirect(route('review.index'));
    }

    /**
     * Display the specified Review.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            Flash::error('Review not found');

            return redirect(route('review.index'));
        }

        return view('review.show')->with('review', $review);
    }

    /**
     * Show the form for editing the specified Review.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            Flash::error('Review not found');

            return redirect(route('review.index'));
        }

        return view('review.edit')->with('review', $review);
    }

    /**
     * Update the specified Review in storage.
     *
     * @param  int              $id
     * @param UpdateReviewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReviewRequest $request)
    {
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            Flash::error('Review not found');

            return redirect(route('review.index'));
        }

        $review = $this->reviewRepository->update($request->all(), $id);

        Flash::success('Review updated successfully.');

        return redirect(route('review.index'));
    }

    /**
     * Remove the specified Review from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $review = $this->reviewRepository->find($id);

        if (empty($review)) {
            Flash::error('Review not found');

            return redirect(route('review.index'));
        }

        $this->reviewRepository->delete($id);

        Flash::success('Review deleted successfully.');

        return redirect(route('review.index'));
    }
}

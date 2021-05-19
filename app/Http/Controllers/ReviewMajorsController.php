<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewMajorsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReviewMajorsRequest;
use App\Http\Requests\UpdateReviewMajorsRequest;
use App\Repositories\ReviewMajorsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReviewMajorsController extends AppBaseController
{
    /** @var  ReviewMajorsRepository */
    private $reviewMajorsRepository;

    public function __construct(ReviewMajorsRepository $reviewMajorsRepo)
    {
        $this->reviewMajorsRepository = $reviewMajorsRepo;
    }

    /**
     * Display a listing of the ReviewMajors.
     *
     * @param ReviewMajorsDataTable $reviewMajorsDataTable
     * @return Response
     */
    public function index(ReviewMajorsDataTable $reviewMajorsDataTable)
    {
        return $reviewMajorsDataTable->render('review_majors.index');
    }

    /**
     * Show the form for creating a new ReviewMajors.
     *
     * @return Response
     */
    public function create()
    {
        return view('review_majors.create');
    }

    /**
     * Store a newly created ReviewMajors in storage.
     *
     * @param CreateReviewMajorsRequest $request
     *
     * @return Response
     */
    public function store(CreateReviewMajorsRequest $request)
    {
        $input = $request->all();

        $reviewMajors = $this->reviewMajorsRepository->create($input);

        Flash::success('Review Majors saved successfully.');

        return redirect(route('reviewMajors.index'));
    }

    /**
     * Display the specified ReviewMajors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            Flash::error('Review Majors not found');

            return redirect(route('reviewMajors.index'));
        }

        return view('review_majors.show')->with('reviewMajors', $reviewMajors);
    }

    /**
     * Show the form for editing the specified ReviewMajors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            Flash::error('Review Majors not found');

            return redirect(route('reviewMajors.index'));
        }

        return view('review_majors.edit')->with('reviewMajors', $reviewMajors);
    }

    /**
     * Update the specified ReviewMajors in storage.
     *
     * @param  int              $id
     * @param UpdateReviewMajorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReviewMajorsRequest $request)
    {
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            Flash::error('Review Majors not found');

            return redirect(route('reviewMajors.index'));
        }

        $reviewMajors = $this->reviewMajorsRepository->update($request->all(), $id);

        Flash::success('Review Majors updated successfully.');

        return redirect(route('reviewMajors.index'));
    }

    /**
     * Remove the specified ReviewMajors from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reviewMajors = $this->reviewMajorsRepository->find($id);

        if (empty($reviewMajors)) {
            Flash::error('Review Majors not found');

            return redirect(route('reviewMajors.index'));
        }

        $this->reviewMajorsRepository->delete($id);

        Flash::success('Review Majors deleted successfully.');

        return redirect(route('reviewMajors.index'));
    }
}

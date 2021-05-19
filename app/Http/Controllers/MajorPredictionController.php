<?php

namespace App\Http\Controllers;

use App\DataTables\MajorPredictionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMajorPredictionRequest;
use App\Http\Requests\UpdateMajorPredictionRequest;
use App\Repositories\MajorPredictionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MajorPredictionController extends AppBaseController
{
    /** @var  MajorPredictionRepository */
    private $majorPredictionRepository;

    public function __construct(MajorPredictionRepository $majorPredictionRepo)
    {
        $this->majorPredictionRepository = $majorPredictionRepo;
    }

    /**
     * Display a listing of the MajorPrediction.
     *
     * @param MajorPredictionDataTable $majorPredictionDataTable
     * @return Response
     */
    public function index(MajorPredictionDataTable $majorPredictionDataTable)
    {
        return $majorPredictionDataTable->render('major_prediction.index');
    }

    /**
     * Show the form for creating a new MajorPrediction.
     *
     * @return Response
     */
    public function create()
    {
        return view('major_prediction.create');
    }

    /**
     * Store a newly created MajorPrediction in storage.
     *
     * @param CreateMajorPredictionRequest $request
     *
     * @return Response
     */
    public function store(CreateMajorPredictionRequest $request)
    {
        $input = $request->all();

        $majorPrediction = $this->majorPredictionRepository->create($input);

        Flash::success('Major Prediction saved successfully.');

        return redirect(route('majorPrediction.index'));
    }

    /**
     * Display the specified MajorPrediction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            Flash::error('Major Prediction not found');

            return redirect(route('majorPrediction.index'));
        }

        return view('major_prediction.show')->with('majorPrediction', $majorPrediction);
    }

    /**
     * Show the form for editing the specified MajorPrediction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            Flash::error('Major Prediction not found');

            return redirect(route('majorPrediction.index'));
        }

        return view('major_prediction.edit')->with('majorPrediction', $majorPrediction);
    }

    /**
     * Update the specified MajorPrediction in storage.
     *
     * @param  int              $id
     * @param UpdateMajorPredictionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMajorPredictionRequest $request)
    {
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            Flash::error('Major Prediction not found');

            return redirect(route('majorPrediction.index'));
        }

        $majorPrediction = $this->majorPredictionRepository->update($request->all(), $id);

        Flash::success('Major Prediction updated successfully.');

        return redirect(route('majorPrediction.index'));
    }

    /**
     * Remove the specified MajorPrediction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $majorPrediction = $this->majorPredictionRepository->find($id);

        if (empty($majorPrediction)) {
            Flash::error('Major Prediction not found');

            return redirect(route('majorPrediction.index'));
        }

        $this->majorPredictionRepository->delete($id);

        Flash::success('Major Prediction deleted successfully.');

        return redirect(route('majorPrediction.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionnaireImageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuestionnaireImageRequest;
use App\Http\Requests\UpdateQuestionnaireImageRequest;
use App\Repositories\QuestionnaireImageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class QuestionnaireImageController extends AppBaseController
{
    /** @var  QuestionnaireImageRepository */
    private $questionnaireImageRepository;

    public function __construct(QuestionnaireImageRepository $questionnaireImageRepo)
    {
        $this->questionnaireImageRepository = $questionnaireImageRepo;
    }

    /**
     * Display a listing of the QuestionnaireImage.
     *
     * @param QuestionnaireImageDataTable $questionnaireImageDataTable
     * @return Response
     */
    public function index(QuestionnaireImageDataTable $questionnaireImageDataTable)
    {
        return $questionnaireImageDataTable->render('questionnaire_image.index');
    }

    /**
     * Show the form for creating a new QuestionnaireImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaire_image.create');
    }

    /**
     * Store a newly created QuestionnaireImage in storage.
     *
     * @param CreateQuestionnaireImageRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireImageRequest $request)
    {
        $input = $request->all();

        $questionnaireImage = $this->questionnaireImageRepository->create($input);

        Flash::success('Questionnaire Image saved successfully.');

        return redirect(route('questionnaireImage.index'));
    }

    /**
     * Display the specified QuestionnaireImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            Flash::error('Questionnaire Image not found');

            return redirect(route('questionnaireImage.index'));
        }

        return view('questionnaire_image.show')->with('questionnaireImage', $questionnaireImage);
    }

    /**
     * Show the form for editing the specified QuestionnaireImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            Flash::error('Questionnaire Image not found');

            return redirect(route('questionnaireImage.index'));
        }

        return view('questionnaire_image.edit')->with('questionnaireImage', $questionnaireImage);
    }

    /**
     * Update the specified QuestionnaireImage in storage.
     *
     * @param  int              $id
     * @param UpdateQuestionnaireImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireImageRequest $request)
    {
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            Flash::error('Questionnaire Image not found');

            return redirect(route('questionnaireImage.index'));
        }

        $questionnaireImage = $this->questionnaireImageRepository->update($request->all(), $id);

        Flash::success('Questionnaire Image updated successfully.');

        return redirect(route('questionnaireImage.index'));
    }

    /**
     * Remove the specified QuestionnaireImage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            Flash::error('Questionnaire Image not found');

            return redirect(route('questionnaireImage.index'));
        }

        $this->questionnaireImageRepository->delete($id);

        Flash::success('Questionnaire Image deleted successfully.');

        return redirect(route('questionnaireImage.index'));
    }
}

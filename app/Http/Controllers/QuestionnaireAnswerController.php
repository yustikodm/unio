<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionnaireAnswerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuestionnaireAnswerRequest;
use App\Http\Requests\UpdateQuestionnaireAnswerRequest;
use App\Repositories\QuestionnaireAnswerRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class QuestionnaireAnswerController extends AppBaseController
{
    /** @var  QuestionnaireAnswerRepository */
    private $questionnaireAnswerRepository;

    public function __construct(QuestionnaireAnswerRepository $questionnaireAnswerRepo)
    {
        $this->questionnaireAnswerRepository = $questionnaireAnswerRepo;
    }

    /**
     * Display a listing of the QuestionnaireAnswer.
     *
     * @param QuestionnaireAnswerDataTable $questionnaireAnswerDataTable
     * @return Response
     */
    public function index(QuestionnaireAnswerDataTable $questionnaireAnswerDataTable)
    {
        return $questionnaireAnswerDataTable->render('questionnaire_answers.index');
    }

    /**
     * Show the form for creating a new QuestionnaireAnswer.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaire_answers.create');
    }

    /**
     * Store a newly created QuestionnaireAnswer in storage.
     *
     * @param CreateQuestionnaireAnswerRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireAnswerRequest $request)
    {
        $input = $request->only([
            'questionairre_id',
            'user_id',
            'answer'
        ]);

        $questionnaireAnswer = $this->questionnaireAnswerRepository->create($input);

        Flash::success('Questionnaire Answer saved successfully.');

        return redirect(route('questionnaire-answers.index'));
    }

    /**
     * Display the specified QuestionnaireAnswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            Flash::error('Questionnaire Answer not found');

            return redirect(route('questionnaire-answers.index'));
        }

        return view('questionnaire_answers.show')->with('questionnaireAnswer', $questionnaireAnswer);
    }

    /**
     * Show the form for editing the specified QuestionnaireAnswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            Flash::error('Questionnaire Answer not found');

            return redirect(route('questionnaire-answers.index'));
        }

        return view('questionnaire_answers.edit')->with('questionnaireAnswer', $questionnaireAnswer);
    }

    /**
     * Update the specified QuestionnaireAnswer in storage.
     *
     * @param  int              $id
     * @param UpdateQuestionnaireAnswerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireAnswerRequest $request)
    {
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            Flash::error('Questionnaire Answer not found');

            return redirect(route('questionnaire-answers.index'));
        }

        $input = $request->only([
            'questionairre_id',
            'user_id',
            'answer'
        ]);

        $questionnaireAnswer = $this->questionnaireAnswerRepository->update($input, $id);

        Flash::success('Questionnaire Answer updated successfully.');

        return redirect(route('questionnaire-answers.index'));
    }

    /**
     * Remove the specified QuestionnaireAnswer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            Flash::error('Questionnaire Answer not found');

            return redirect(route('questionnaire-answers.index'));
        }

        $this->questionnaireAnswerRepository->delete($id);

        Flash::success('Questionnaire Answer deleted successfully.');

        return redirect(route('questionnaire-answers.index'));
    }
}

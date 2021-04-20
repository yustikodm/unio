<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionnaireDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Repositories\QuestionnaireRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class QuestionnaireController extends AppBaseController
{
    /** @var  QuestionnaireRepository */
    private $questionnaireRepository;

    public function __construct(QuestionnaireRepository $questionnaireRepo)
    {
        $this->questionnaireRepository = $questionnaireRepo;
    }

    /**
     * Display a listing of the Questionnaire.
     *
     * @param QuestionnaireDataTable $questionnaireDataTable
     * @return Response
     */
    public function index(QuestionnaireDataTable $questionnaireDataTable)
    {
        return $questionnaireDataTable->render('questionnaires.index');
    }

    /**
     * Show the form for creating a new Questionnaire.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created Questionnaire in storage.
     *
     * @param CreateQuestionnaireRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireRequest $request)
    {
        $input = $request->only([
            'question',
            'type',
            'answer_choice'
        ]);

        $questionnaire = $this->questionnaireRepository->create($input);

        Flash::success('Questionnaire saved successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Display the specified Questionnaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.show')->with('questionnaire', $questionnaire);
    }

    /**
     * Show the form for editing the specified Questionnaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.edit')->with('questionnaire', $questionnaire);
    }

    /**
     * Update the specified Questionnaire in storage.
     *
     * @param  int              $id
     * @param UpdateQuestionnaireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireRequest $request)
    {
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        $input = $request->only([
            'question',
            'type',
            'answer_choice'
        ]);

        $questionnaire = $this->questionnaireRepository->update($input, $id);

        Flash::success('Questionnaire updated successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Remove the specified Questionnaire from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        $this->questionnaireRepository->delete($id);

        Flash::success('Questionnaire deleted successfully.');

        return redirect(route('questionnaires.index'));
    }
}

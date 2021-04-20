<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuestionnaireAnswerAPIRequest;
use App\Http\Requests\API\UpdateQuestionnaireAnswerAPIRequest;
use App\Models\QuestionnaireAnswer;
use App\Repositories\QuestionnaireAnswerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\QuestionnaireAnswerResource;
use Response;

/**
 * Class QuestionnaireAnswerController
 * @package App\Http\Controllers\API
 */

class QuestionnaireAnswerAPIController extends AppBaseController
{
    /** @var  QuestionnaireAnswerRepository */
    private $questionnaireAnswerRepository;

    public function __construct(QuestionnaireAnswerRepository $questionnaireAnswerRepo)
    {
        $this->questionnaireAnswerRepository = $questionnaireAnswerRepo;
    }

    /**
     * Display a listing of the QuestionnaireAnswer.
     * GET|HEAD /questionnaireAnswers
     *
     * @return Response
     */
    public function index()
    {
        $questionnaireAnswers = $this->questionnaireAnswerRepository->paginate(15);

        return $this->sendResponse($questionnaireAnswers, 'Questionnaire Answers retrieved successfully');
    }

    /**
     * Store a newly created QuestionnaireAnswer in storage.
     * POST /questionnaireAnswers
     *
     * @param CreateQuestionnaireAnswerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireAnswerAPIRequest $request)
    {
        $input = $request->only([
            'questionairre_id',
            'user_id',
            'answer'
        ]);

        $questionnaireAnswer = $this->questionnaireAnswerRepository->create($input);

        return $this->sendResponse(new QuestionnaireAnswerResource($questionnaireAnswer), 'Questionnaire Answer saved successfully');
    }

    /**
     * Display the specified QuestionnaireAnswer.
     * GET|HEAD /questionnaireAnswers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var QuestionnaireAnswer $questionnaireAnswer */
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            return $this->sendError('Questionnaire Answer not found');
        }

        return $this->sendResponse(new QuestionnaireAnswerResource($questionnaireAnswer), 'Questionnaire Answer retrieved successfully');
    }

    /**
     * Update the specified QuestionnaireAnswer in storage.
     * PUT/PATCH /questionnaireAnswers/{id}
     *
     * @param int $id
     * @param UpdateQuestionnaireAnswerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireAnswerAPIRequest $request)
    {
        $input = $request->only([
            'questionairre_id',
            'user_id',
            'answer'
        ]);

        /** @var QuestionnaireAnswer $questionnaireAnswer */
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            return $this->sendError('Questionnaire Answer not found');
        }

        $questionnaireAnswer = $this->questionnaireAnswerRepository->update($input, $id);

        return $this->sendResponse(new QuestionnaireAnswerResource($questionnaireAnswer), 'QuestionnaireAnswer updated successfully');
    }

    /**
     * Remove the specified QuestionnaireAnswer from storage.
     * DELETE /questionnaireAnswers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var QuestionnaireAnswer $questionnaireAnswer */
        $questionnaireAnswer = $this->questionnaireAnswerRepository->find($id);

        if (empty($questionnaireAnswer)) {
            return $this->sendError('Questionnaire Answer not found');
        }

        $questionnaireAnswer->delete();

        return $this->sendSuccess('Questionnaire Answer deleted successfully');
    }
}

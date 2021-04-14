<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuestionnaireAPIRequest;
use App\Http\Requests\API\UpdateQuestionnaireAPIRequest;
use App\Models\Questionnaire;
use App\Repositories\QuestionnaireRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\QuestionnaireResource;
use Response;

/**
 * Class QuestionnaireController
 * @package App\Http\Controllers\API
 */

class QuestionnaireAPIController extends AppBaseController
{
    /** @var  QuestionnaireRepository */
    private $questionnaireRepository;

    public function __construct(QuestionnaireRepository $questionnaireRepo)
    {
        $this->questionnaireRepository = $questionnaireRepo;
    }

    /**
     * Display a listing of the Questionnaire.
     * GET|HEAD /questionnaires
     *
     * @return Response
     */
    public function index()
    {
        $questionnaires = $this->questionnaireRepository->paginate(15);

        return $this->sendResponse($questionnaires, 'Questionnaires retrieved successfully');
    }

    /**
     * Store a newly created Questionnaire in storage.
     * POST /questionnaires
     *
     * @param CreateQuestionnaireAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireAPIRequest $request)
    {
        $input = $request->all();

        $questionnaire = $this->questionnaireRepository->create($input);

        return $this->sendResponse(new QuestionnaireResource($questionnaire), 'Questionnaire saved successfully');
    }

    /**
     * Display the specified Questionnaire.
     * GET|HEAD /questionnaires/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Questionnaire $questionnaire */
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            return $this->sendError('Questionnaire not found');
        }

        return $this->sendResponse(new QuestionnaireResource($questionnaire), 'Questionnaire retrieved successfully');
    }

    /**
     * Update the specified Questionnaire in storage.
     * PUT/PATCH /questionnaires/{id}
     *
     * @param int $id
     * @param UpdateQuestionnaireAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireAPIRequest $request)
    {
        $input = $request->all();

        /** @var Questionnaire $questionnaire */
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            return $this->sendError('Questionnaire not found');
        }

        $questionnaire = $this->questionnaireRepository->update($input, $id);

        return $this->sendResponse(new QuestionnaireResource($questionnaire), 'Questionnaire updated successfully');
    }

    /**
     * Remove the specified Questionnaire from storage.
     * DELETE /questionnaires/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Questionnaire $questionnaire */
        $questionnaire = $this->questionnaireRepository->find($id);

        if (empty($questionnaire)) {
            return $this->sendError('Questionnaire not found');
        }

        $questionnaire->delete();

        return $this->sendSuccess('Questionnaire deleted successfully');
    }
}

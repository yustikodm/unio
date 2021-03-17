<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\QuestionnaireAnswer;

class QuestionnaireAnswerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/questionnaire_answers', $questionnaireAnswer
        );

        $this->assertApiResponse($questionnaireAnswer);
    }

    /**
     * @test
     */
    public function test_read_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/questionnaire_answers/'.$questionnaireAnswer->id
        );

        $this->assertApiResponse($questionnaireAnswer->toArray());
    }

    /**
     * @test
     */
    public function test_update_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();
        $editedQuestionnaireAnswer = factory(QuestionnaireAnswer::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/questionnaire_answers/'.$questionnaireAnswer->id,
            $editedQuestionnaireAnswer
        );

        $this->assertApiResponse($editedQuestionnaireAnswer);
    }

    /**
     * @test
     */
    public function test_delete_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/questionnaire_answers/'.$questionnaireAnswer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/questionnaire_answers/'.$questionnaireAnswer->id
        );

        $this->response->assertStatus(404);
    }
}

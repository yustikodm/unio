<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Questionnaire;

class QuestionnaireApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/questionnaires', $questionnaire
        );

        $this->assertApiResponse($questionnaire);
    }

    /**
     * @test
     */
    public function test_read_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/questionnaires/'.$questionnaire->id
        );

        $this->assertApiResponse($questionnaire->toArray());
    }

    /**
     * @test
     */
    public function test_update_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();
        $editedQuestionnaire = factory(Questionnaire::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/questionnaires/'.$questionnaire->id,
            $editedQuestionnaire
        );

        $this->assertApiResponse($editedQuestionnaire);
    }

    /**
     * @test
     */
    public function test_delete_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/questionnaires/'.$questionnaire->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/questionnaires/'.$questionnaire->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\QuestionnaireImage;

class QuestionnaireImageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/questionnaire_image', $questionnaireImage
        );

        $this->assertApiResponse($questionnaireImage);
    }

    /**
     * @test
     */
    public function test_read_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/questionnaire_image/'.$questionnaireImage->id
        );

        $this->assertApiResponse($questionnaireImage->toArray());
    }

    /**
     * @test
     */
    public function test_update_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();
        $editedQuestionnaireImage = factory(QuestionnaireImage::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/questionnaire_image/'.$questionnaireImage->id,
            $editedQuestionnaireImage
        );

        $this->assertApiResponse($editedQuestionnaireImage);
    }

    /**
     * @test
     */
    public function test_delete_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/questionnaire_image/'.$questionnaireImage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/questionnaire_image/'.$questionnaireImage->id
        );

        $this->response->assertStatus(404);
    }
}

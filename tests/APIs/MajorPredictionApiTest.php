<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MajorPrediction;

class MajorPredictionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/major_prediction', $majorPrediction
        );

        $this->assertApiResponse($majorPrediction);
    }

    /**
     * @test
     */
    public function test_read_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/major_prediction/'.$majorPrediction->id
        );

        $this->assertApiResponse($majorPrediction->toArray());
    }

    /**
     * @test
     */
    public function test_update_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();
        $editedMajorPrediction = factory(MajorPrediction::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/major_prediction/'.$majorPrediction->id,
            $editedMajorPrediction
        );

        $this->assertApiResponse($editedMajorPrediction);
    }

    /**
     * @test
     */
    public function test_delete_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/major_prediction/'.$majorPrediction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/major_prediction/'.$majorPrediction->id
        );

        $this->response->assertStatus(404);
    }
}

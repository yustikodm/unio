<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LevelMajor;

class LevelMajorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/level_major', $levelMajor
        );

        $this->assertApiResponse($levelMajor);
    }

    /**
     * @test
     */
    public function test_read_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/level_major/'.$levelMajor->id
        );

        $this->assertApiResponse($levelMajor->toArray());
    }

    /**
     * @test
     */
    public function test_update_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();
        $editedLevelMajor = factory(LevelMajor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/level_major/'.$levelMajor->id,
            $editedLevelMajor
        );

        $this->assertApiResponse($editedLevelMajor);
    }

    /**
     * @test
     */
    public function test_delete_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/level_major/'.$levelMajor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/level_major/'.$levelMajor->id
        );

        $this->response->assertStatus(404);
    }
}

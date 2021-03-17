<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LevelMitra;

class LevelMitraApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/level_mitra', $levelMitra
        );

        $this->assertApiResponse($levelMitra);
    }

    /**
     * @test
     */
    public function test_read_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/level_mitra/'.$levelMitra->id
        );

        $this->assertApiResponse($levelMitra->toArray());
    }

    /**
     * @test
     */
    public function test_update_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();
        $editedLevelMitra = factory(LevelMitra::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/level_mitra/'.$levelMitra->id,
            $editedLevelMitra
        );

        $this->assertApiResponse($editedLevelMitra);
    }

    /**
     * @test
     */
    public function test_delete_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/level_mitra/'.$levelMitra->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/level_mitra/'.$levelMitra->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\University;

class UniversityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university()
    {
        $university = factory(University::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/universities', $university
        );

        $this->assertApiResponse($university);
    }

    /**
     * @test
     */
    public function test_read_university()
    {
        $university = factory(University::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/universities/'.$university->id
        );

        $this->assertApiResponse($university->toArray());
    }

    /**
     * @test
     */
    public function test_update_university()
    {
        $university = factory(University::class)->create();
        $editedUniversity = factory(University::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/universities/'.$university->id,
            $editedUniversity
        );

        $this->assertApiResponse($editedUniversity);
    }

    /**
     * @test
     */
    public function test_delete_university()
    {
        $university = factory(University::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/universities/'.$university->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/universities/'.$university->id
        );

        $this->response->assertStatus(404);
    }
}

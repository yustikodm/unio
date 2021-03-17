<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UniversityMajor;

class UniversityMajorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/university_majors', $universityMajor
        );

        $this->assertApiResponse($universityMajor);
    }

    /**
     * @test
     */
    public function test_read_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/university_majors/'.$universityMajor->id
        );

        $this->assertApiResponse($universityMajor->toArray());
    }

    /**
     * @test
     */
    public function test_update_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();
        $editedUniversityMajor = factory(UniversityMajor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/university_majors/'.$universityMajor->id,
            $editedUniversityMajor
        );

        $this->assertApiResponse($editedUniversityMajor);
    }

    /**
     * @test
     */
    public function test_delete_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/university_majors/'.$universityMajor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/university_majors/'.$universityMajor->id
        );

        $this->response->assertStatus(404);
    }
}

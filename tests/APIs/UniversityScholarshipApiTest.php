<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UniversityScholarship;

class UniversityScholarshipApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/university_scholarships', $universityScholarship
        );

        $this->assertApiResponse($universityScholarship);
    }

    /**
     * @test
     */
    public function test_read_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/university_scholarships/'.$universityScholarship->id
        );

        $this->assertApiResponse($universityScholarship->toArray());
    }

    /**
     * @test
     */
    public function test_update_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();
        $editedUniversityScholarship = factory(UniversityScholarship::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/university_scholarships/'.$universityScholarship->id,
            $editedUniversityScholarship
        );

        $this->assertApiResponse($editedUniversityScholarship);
    }

    /**
     * @test
     */
    public function test_delete_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/university_scholarships/'.$universityScholarship->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/university_scholarships/'.$universityScholarship->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UniversityFaculties;

class UniversityFacultiesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/university_faculties', $universityFaculties
        );

        $this->assertApiResponse($universityFaculties);
    }

    /**
     * @test
     */
    public function test_read_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/university_faculties/'.$universityFaculties->id
        );

        $this->assertApiResponse($universityFaculties->toArray());
    }

    /**
     * @test
     */
    public function test_update_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();
        $editedUniversityFaculties = factory(UniversityFaculties::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/university_faculties/'.$universityFaculties->id,
            $editedUniversityFaculties
        );

        $this->assertApiResponse($editedUniversityFaculties);
    }

    /**
     * @test
     */
    public function test_delete_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/university_faculties/'.$universityFaculties->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/university_faculties/'.$universityFaculties->id
        );

        $this->response->assertStatus(404);
    }
}

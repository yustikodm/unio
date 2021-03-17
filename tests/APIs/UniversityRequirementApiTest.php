<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UniversityRequirement;

class UniversityRequirementApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/university_requirements', $universityRequirement
        );

        $this->assertApiResponse($universityRequirement);
    }

    /**
     * @test
     */
    public function test_read_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/university_requirements/'.$universityRequirement->id
        );

        $this->assertApiResponse($universityRequirement->toArray());
    }

    /**
     * @test
     */
    public function test_update_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();
        $editedUniversityRequirement = factory(UniversityRequirement::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/university_requirements/'.$universityRequirement->id,
            $editedUniversityRequirement
        );

        $this->assertApiResponse($editedUniversityRequirement);
    }

    /**
     * @test
     */
    public function test_delete_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/university_requirements/'.$universityRequirement->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/university_requirements/'.$universityRequirement->id
        );

        $this->response->assertStatus(404);
    }
}

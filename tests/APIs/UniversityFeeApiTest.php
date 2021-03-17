<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UniversityFee;

class UniversityFeeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/university_fees', $universityFee
        );

        $this->assertApiResponse($universityFee);
    }

    /**
     * @test
     */
    public function test_read_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/university_fees/'.$universityFee->id
        );

        $this->assertApiResponse($universityFee->toArray());
    }

    /**
     * @test
     */
    public function test_update_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();
        $editedUniversityFee = factory(UniversityFee::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/university_fees/'.$universityFee->id,
            $editedUniversityFee
        );

        $this->assertApiResponse($editedUniversityFee);
    }

    /**
     * @test
     */
    public function test_delete_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/university_fees/'.$universityFee->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/university_fees/'.$universityFee->id
        );

        $this->response->assertStatus(404);
    }
}

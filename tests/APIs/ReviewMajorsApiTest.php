<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ReviewMajors;

class ReviewMajorsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/review_majors', $reviewMajors
        );

        $this->assertApiResponse($reviewMajors);
    }

    /**
     * @test
     */
    public function test_read_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/review_majors/'.$reviewMajors->id
        );

        $this->assertApiResponse($reviewMajors->toArray());
    }

    /**
     * @test
     */
    public function test_update_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();
        $editedReviewMajors = factory(ReviewMajors::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/review_majors/'.$reviewMajors->id,
            $editedReviewMajors
        );

        $this->assertApiResponse($editedReviewMajors);
    }

    /**
     * @test
     */
    public function test_delete_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/review_majors/'.$reviewMajors->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/review_majors/'.$reviewMajors->id
        );

        $this->response->assertStatus(404);
    }
}

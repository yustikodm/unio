<?php namespace Tests\Repositories;

use App\Models\ReviewMajors;
use App\Repositories\ReviewMajorsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ReviewMajorsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReviewMajorsRepository
     */
    protected $reviewMajorsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reviewMajorsRepo = \App::make(ReviewMajorsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->make()->toArray();

        $createdReviewMajors = $this->reviewMajorsRepo->create($reviewMajors);

        $createdReviewMajors = $createdReviewMajors->toArray();
        $this->assertArrayHasKey('id', $createdReviewMajors);
        $this->assertNotNull($createdReviewMajors['id'], 'Created ReviewMajors must have id specified');
        $this->assertNotNull(ReviewMajors::find($createdReviewMajors['id']), 'ReviewMajors with given id must be in DB');
        $this->assertModelData($reviewMajors, $createdReviewMajors);
    }

    /**
     * @test read
     */
    public function test_read_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();

        $dbReviewMajors = $this->reviewMajorsRepo->find($reviewMajors->id);

        $dbReviewMajors = $dbReviewMajors->toArray();
        $this->assertModelData($reviewMajors->toArray(), $dbReviewMajors);
    }

    /**
     * @test update
     */
    public function test_update_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();
        $fakeReviewMajors = factory(ReviewMajors::class)->make()->toArray();

        $updatedReviewMajors = $this->reviewMajorsRepo->update($fakeReviewMajors, $reviewMajors->id);

        $this->assertModelData($fakeReviewMajors, $updatedReviewMajors->toArray());
        $dbReviewMajors = $this->reviewMajorsRepo->find($reviewMajors->id);
        $this->assertModelData($fakeReviewMajors, $dbReviewMajors->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_review_majors()
    {
        $reviewMajors = factory(ReviewMajors::class)->create();

        $resp = $this->reviewMajorsRepo->delete($reviewMajors->id);

        $this->assertTrue($resp);
        $this->assertNull(ReviewMajors::find($reviewMajors->id), 'ReviewMajors should not exist in DB');
    }
}

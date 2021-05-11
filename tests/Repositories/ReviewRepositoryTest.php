<?php namespace Tests\Repositories;

use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ReviewRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReviewRepository
     */
    protected $reviewRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reviewRepo = \App::make(ReviewRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_review()
    {
        $review = factory(Review::class)->make()->toArray();

        $createdReview = $this->reviewRepo->create($review);

        $createdReview = $createdReview->toArray();
        $this->assertArrayHasKey('id', $createdReview);
        $this->assertNotNull($createdReview['id'], 'Created Review must have id specified');
        $this->assertNotNull(Review::find($createdReview['id']), 'Review with given id must be in DB');
        $this->assertModelData($review, $createdReview);
    }

    /**
     * @test read
     */
    public function test_read_review()
    {
        $review = factory(Review::class)->create();

        $dbReview = $this->reviewRepo->find($review->id);

        $dbReview = $dbReview->toArray();
        $this->assertModelData($review->toArray(), $dbReview);
    }

    /**
     * @test update
     */
    public function test_update_review()
    {
        $review = factory(Review::class)->create();
        $fakeReview = factory(Review::class)->make()->toArray();

        $updatedReview = $this->reviewRepo->update($fakeReview, $review->id);

        $this->assertModelData($fakeReview, $updatedReview->toArray());
        $dbReview = $this->reviewRepo->find($review->id);
        $this->assertModelData($fakeReview, $dbReview->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_review()
    {
        $review = factory(Review::class)->create();

        $resp = $this->reviewRepo->delete($review->id);

        $this->assertTrue($resp);
        $this->assertNull(Review::find($review->id), 'Review should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\TopupHistory;
use App\Repositories\TopupHistoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TopupHistoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TopupHistoryRepository
     */
    protected $topupHistoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->topupHistoryRepo = \App::make(TopupHistoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->make()->toArray();

        $createdTopupHistory = $this->topupHistoryRepo->create($topupHistory);

        $createdTopupHistory = $createdTopupHistory->toArray();
        $this->assertArrayHasKey('id', $createdTopupHistory);
        $this->assertNotNull($createdTopupHistory['id'], 'Created TopupHistory must have id specified');
        $this->assertNotNull(TopupHistory::find($createdTopupHistory['id']), 'TopupHistory with given id must be in DB');
        $this->assertModelData($topupHistory, $createdTopupHistory);
    }

    /**
     * @test read
     */
    public function test_read_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();

        $dbTopupHistory = $this->topupHistoryRepo->find($topupHistory->id);

        $dbTopupHistory = $dbTopupHistory->toArray();
        $this->assertModelData($topupHistory->toArray(), $dbTopupHistory);
    }

    /**
     * @test update
     */
    public function test_update_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();
        $fakeTopupHistory = factory(TopupHistory::class)->make()->toArray();

        $updatedTopupHistory = $this->topupHistoryRepo->update($fakeTopupHistory, $topupHistory->id);

        $this->assertModelData($fakeTopupHistory, $updatedTopupHistory->toArray());
        $dbTopupHistory = $this->topupHistoryRepo->find($topupHistory->id);
        $this->assertModelData($fakeTopupHistory, $dbTopupHistory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();

        $resp = $this->topupHistoryRepo->delete($topupHistory->id);

        $this->assertTrue($resp);
        $this->assertNull(TopupHistory::find($topupHistory->id), 'TopupHistory should not exist in DB');
    }
}

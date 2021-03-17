<?php namespace Tests\Repositories;

use App\Models\LogPoin;
use App\Repositories\LogPoinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LogPoinRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogPoinRepository
     */
    protected $logPoinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logPoinRepo = \App::make(LogPoinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_log_poin()
    {
        $logPoin = factory(LogPoin::class)->make()->toArray();

        $createdLogPoin = $this->logPoinRepo->create($logPoin);

        $createdLogPoin = $createdLogPoin->toArray();
        $this->assertArrayHasKey('id', $createdLogPoin);
        $this->assertNotNull($createdLogPoin['id'], 'Created LogPoin must have id specified');
        $this->assertNotNull(LogPoin::find($createdLogPoin['id']), 'LogPoin with given id must be in DB');
        $this->assertModelData($logPoin, $createdLogPoin);
    }

    /**
     * @test read
     */
    public function test_read_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();

        $dbLogPoin = $this->logPoinRepo->find($logPoin->id);

        $dbLogPoin = $dbLogPoin->toArray();
        $this->assertModelData($logPoin->toArray(), $dbLogPoin);
    }

    /**
     * @test update
     */
    public function test_update_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();
        $fakeLogPoin = factory(LogPoin::class)->make()->toArray();

        $updatedLogPoin = $this->logPoinRepo->update($fakeLogPoin, $logPoin->id);

        $this->assertModelData($fakeLogPoin, $updatedLogPoin->toArray());
        $dbLogPoin = $this->logPoinRepo->find($logPoin->id);
        $this->assertModelData($fakeLogPoin, $dbLogPoin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();

        $resp = $this->logPoinRepo->delete($logPoin->id);

        $this->assertTrue($resp);
        $this->assertNull(LogPoin::find($logPoin->id), 'LogPoin should not exist in DB');
    }
}

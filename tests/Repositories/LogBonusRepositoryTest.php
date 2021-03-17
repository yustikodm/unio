<?php namespace Tests\Repositories;

use App\Models\LogBonus;
use App\Repositories\LogBonusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LogBonusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogBonusRepository
     */
    protected $logBonusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logBonusRepo = \App::make(LogBonusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->make()->toArray();

        $createdLogBonus = $this->logBonusRepo->create($logBonus);

        $createdLogBonus = $createdLogBonus->toArray();
        $this->assertArrayHasKey('id', $createdLogBonus);
        $this->assertNotNull($createdLogBonus['id'], 'Created LogBonus must have id specified');
        $this->assertNotNull(LogBonus::find($createdLogBonus['id']), 'LogBonus with given id must be in DB');
        $this->assertModelData($logBonus, $createdLogBonus);
    }

    /**
     * @test read
     */
    public function test_read_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();

        $dbLogBonus = $this->logBonusRepo->find($logBonus->id);

        $dbLogBonus = $dbLogBonus->toArray();
        $this->assertModelData($logBonus->toArray(), $dbLogBonus);
    }

    /**
     * @test update
     */
    public function test_update_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();
        $fakeLogBonus = factory(LogBonus::class)->make()->toArray();

        $updatedLogBonus = $this->logBonusRepo->update($fakeLogBonus, $logBonus->id);

        $this->assertModelData($fakeLogBonus, $updatedLogBonus->toArray());
        $dbLogBonus = $this->logBonusRepo->find($logBonus->id);
        $this->assertModelData($fakeLogBonus, $dbLogBonus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();

        $resp = $this->logBonusRepo->delete($logBonus->id);

        $this->assertTrue($resp);
        $this->assertNull(LogBonus::find($logBonus->id), 'LogBonus should not exist in DB');
    }
}

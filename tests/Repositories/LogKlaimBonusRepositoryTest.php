<?php namespace Tests\Repositories;

use App\Models\LogKlaimBonus;
use App\Repositories\LogKlaimBonusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LogKlaimBonusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogKlaimBonusRepository
     */
    protected $logKlaimBonusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logKlaimBonusRepo = \App::make(LogKlaimBonusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->make()->toArray();

        $createdLogKlaimBonus = $this->logKlaimBonusRepo->create($logKlaimBonus);

        $createdLogKlaimBonus = $createdLogKlaimBonus->toArray();
        $this->assertArrayHasKey('id', $createdLogKlaimBonus);
        $this->assertNotNull($createdLogKlaimBonus['id'], 'Created LogKlaimBonus must have id specified');
        $this->assertNotNull(LogKlaimBonus::find($createdLogKlaimBonus['id']), 'LogKlaimBonus with given id must be in DB');
        $this->assertModelData($logKlaimBonus, $createdLogKlaimBonus);
    }

    /**
     * @test read
     */
    public function test_read_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();

        $dbLogKlaimBonus = $this->logKlaimBonusRepo->find($logKlaimBonus->id);

        $dbLogKlaimBonus = $dbLogKlaimBonus->toArray();
        $this->assertModelData($logKlaimBonus->toArray(), $dbLogKlaimBonus);
    }

    /**
     * @test update
     */
    public function test_update_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();
        $fakeLogKlaimBonus = factory(LogKlaimBonus::class)->make()->toArray();

        $updatedLogKlaimBonus = $this->logKlaimBonusRepo->update($fakeLogKlaimBonus, $logKlaimBonus->id);

        $this->assertModelData($fakeLogKlaimBonus, $updatedLogKlaimBonus->toArray());
        $dbLogKlaimBonus = $this->logKlaimBonusRepo->find($logKlaimBonus->id);
        $this->assertModelData($fakeLogKlaimBonus, $dbLogKlaimBonus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();

        $resp = $this->logKlaimBonusRepo->delete($logKlaimBonus->id);

        $this->assertTrue($resp);
        $this->assertNull(LogKlaimBonus::find($logKlaimBonus->id), 'LogKlaimBonus should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\LogBintang;
use App\Repositories\LogBintangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LogBintangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogBintangRepository
     */
    protected $logBintangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logBintangRepo = \App::make(LogBintangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->make()->toArray();

        $createdLogBintang = $this->logBintangRepo->create($logBintang);

        $createdLogBintang = $createdLogBintang->toArray();
        $this->assertArrayHasKey('id', $createdLogBintang);
        $this->assertNotNull($createdLogBintang['id'], 'Created LogBintang must have id specified');
        $this->assertNotNull(LogBintang::find($createdLogBintang['id']), 'LogBintang with given id must be in DB');
        $this->assertModelData($logBintang, $createdLogBintang);
    }

    /**
     * @test read
     */
    public function test_read_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();

        $dbLogBintang = $this->logBintangRepo->find($logBintang->id);

        $dbLogBintang = $dbLogBintang->toArray();
        $this->assertModelData($logBintang->toArray(), $dbLogBintang);
    }

    /**
     * @test update
     */
    public function test_update_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();
        $fakeLogBintang = factory(LogBintang::class)->make()->toArray();

        $updatedLogBintang = $this->logBintangRepo->update($fakeLogBintang, $logBintang->id);

        $this->assertModelData($fakeLogBintang, $updatedLogBintang->toArray());
        $dbLogBintang = $this->logBintangRepo->find($logBintang->id);
        $this->assertModelData($fakeLogBintang, $dbLogBintang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();

        $resp = $this->logBintangRepo->delete($logBintang->id);

        $this->assertTrue($resp);
        $this->assertNull(LogBintang::find($logBintang->id), 'LogBintang should not exist in DB');
    }
}

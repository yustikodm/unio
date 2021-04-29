<?php namespace Tests\Repositories;

use App\Models\PointLog;
use App\Repositories\PointLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PointLogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PointLogRepository
     */
    protected $pointLogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pointLogRepo = \App::make(PointLogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_point_log()
    {
        $pointLog = factory(PointLog::class)->make()->toArray();

        $createdPointLog = $this->pointLogRepo->create($pointLog);

        $createdPointLog = $createdPointLog->toArray();
        $this->assertArrayHasKey('id', $createdPointLog);
        $this->assertNotNull($createdPointLog['id'], 'Created PointLog must have id specified');
        $this->assertNotNull(PointLog::find($createdPointLog['id']), 'PointLog with given id must be in DB');
        $this->assertModelData($pointLog, $createdPointLog);
    }

    /**
     * @test read
     */
    public function test_read_point_log()
    {
        $pointLog = factory(PointLog::class)->create();

        $dbPointLog = $this->pointLogRepo->find($pointLog->id);

        $dbPointLog = $dbPointLog->toArray();
        $this->assertModelData($pointLog->toArray(), $dbPointLog);
    }

    /**
     * @test update
     */
    public function test_update_point_log()
    {
        $pointLog = factory(PointLog::class)->create();
        $fakePointLog = factory(PointLog::class)->make()->toArray();

        $updatedPointLog = $this->pointLogRepo->update($fakePointLog, $pointLog->id);

        $this->assertModelData($fakePointLog, $updatedPointLog->toArray());
        $dbPointLog = $this->pointLogRepo->find($pointLog->id);
        $this->assertModelData($fakePointLog, $dbPointLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_point_log()
    {
        $pointLog = factory(PointLog::class)->create();

        $resp = $this->pointLogRepo->delete($pointLog->id);

        $this->assertTrue($resp);
        $this->assertNull(PointLog::find($pointLog->id), 'PointLog should not exist in DB');
    }
}

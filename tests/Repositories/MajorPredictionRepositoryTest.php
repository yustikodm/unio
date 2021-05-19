<?php namespace Tests\Repositories;

use App\Models\MajorPrediction;
use App\Repositories\MajorPredictionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MajorPredictionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MajorPredictionRepository
     */
    protected $majorPredictionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->majorPredictionRepo = \App::make(MajorPredictionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->make()->toArray();

        $createdMajorPrediction = $this->majorPredictionRepo->create($majorPrediction);

        $createdMajorPrediction = $createdMajorPrediction->toArray();
        $this->assertArrayHasKey('id', $createdMajorPrediction);
        $this->assertNotNull($createdMajorPrediction['id'], 'Created MajorPrediction must have id specified');
        $this->assertNotNull(MajorPrediction::find($createdMajorPrediction['id']), 'MajorPrediction with given id must be in DB');
        $this->assertModelData($majorPrediction, $createdMajorPrediction);
    }

    /**
     * @test read
     */
    public function test_read_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();

        $dbMajorPrediction = $this->majorPredictionRepo->find($majorPrediction->id);

        $dbMajorPrediction = $dbMajorPrediction->toArray();
        $this->assertModelData($majorPrediction->toArray(), $dbMajorPrediction);
    }

    /**
     * @test update
     */
    public function test_update_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();
        $fakeMajorPrediction = factory(MajorPrediction::class)->make()->toArray();

        $updatedMajorPrediction = $this->majorPredictionRepo->update($fakeMajorPrediction, $majorPrediction->id);

        $this->assertModelData($fakeMajorPrediction, $updatedMajorPrediction->toArray());
        $dbMajorPrediction = $this->majorPredictionRepo->find($majorPrediction->id);
        $this->assertModelData($fakeMajorPrediction, $dbMajorPrediction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_major_prediction()
    {
        $majorPrediction = factory(MajorPrediction::class)->create();

        $resp = $this->majorPredictionRepo->delete($majorPrediction->id);

        $this->assertTrue($resp);
        $this->assertNull(MajorPrediction::find($majorPrediction->id), 'MajorPrediction should not exist in DB');
    }
}

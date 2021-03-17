<?php namespace Tests\Repositories;

use App\Models\LevelMitra;
use App\Repositories\LevelMitraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LevelMitraRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LevelMitraRepository
     */
    protected $levelMitraRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->levelMitraRepo = \App::make(LevelMitraRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->make()->toArray();

        $createdLevelMitra = $this->levelMitraRepo->create($levelMitra);

        $createdLevelMitra = $createdLevelMitra->toArray();
        $this->assertArrayHasKey('id', $createdLevelMitra);
        $this->assertNotNull($createdLevelMitra['id'], 'Created LevelMitra must have id specified');
        $this->assertNotNull(LevelMitra::find($createdLevelMitra['id']), 'LevelMitra with given id must be in DB');
        $this->assertModelData($levelMitra, $createdLevelMitra);
    }

    /**
     * @test read
     */
    public function test_read_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();

        $dbLevelMitra = $this->levelMitraRepo->find($levelMitra->id);

        $dbLevelMitra = $dbLevelMitra->toArray();
        $this->assertModelData($levelMitra->toArray(), $dbLevelMitra);
    }

    /**
     * @test update
     */
    public function test_update_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();
        $fakeLevelMitra = factory(LevelMitra::class)->make()->toArray();

        $updatedLevelMitra = $this->levelMitraRepo->update($fakeLevelMitra, $levelMitra->id);

        $this->assertModelData($fakeLevelMitra, $updatedLevelMitra->toArray());
        $dbLevelMitra = $this->levelMitraRepo->find($levelMitra->id);
        $this->assertModelData($fakeLevelMitra, $dbLevelMitra->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_level_mitra()
    {
        $levelMitra = factory(LevelMitra::class)->create();

        $resp = $this->levelMitraRepo->delete($levelMitra->id);

        $this->assertTrue($resp);
        $this->assertNull(LevelMitra::find($levelMitra->id), 'LevelMitra should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\LevelMajor;
use App\Repositories\LevelMajorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LevelMajorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LevelMajorRepository
     */
    protected $levelMajorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->levelMajorRepo = \App::make(LevelMajorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->make()->toArray();

        $createdLevelMajor = $this->levelMajorRepo->create($levelMajor);

        $createdLevelMajor = $createdLevelMajor->toArray();
        $this->assertArrayHasKey('id', $createdLevelMajor);
        $this->assertNotNull($createdLevelMajor['id'], 'Created LevelMajor must have id specified');
        $this->assertNotNull(LevelMajor::find($createdLevelMajor['id']), 'LevelMajor with given id must be in DB');
        $this->assertModelData($levelMajor, $createdLevelMajor);
    }

    /**
     * @test read
     */
    public function test_read_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();

        $dbLevelMajor = $this->levelMajorRepo->find($levelMajor->id);

        $dbLevelMajor = $dbLevelMajor->toArray();
        $this->assertModelData($levelMajor->toArray(), $dbLevelMajor);
    }

    /**
     * @test update
     */
    public function test_update_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();
        $fakeLevelMajor = factory(LevelMajor::class)->make()->toArray();

        $updatedLevelMajor = $this->levelMajorRepo->update($fakeLevelMajor, $levelMajor->id);

        $this->assertModelData($fakeLevelMajor, $updatedLevelMajor->toArray());
        $dbLevelMajor = $this->levelMajorRepo->find($levelMajor->id);
        $this->assertModelData($fakeLevelMajor, $dbLevelMajor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_level_major()
    {
        $levelMajor = factory(LevelMajor::class)->create();

        $resp = $this->levelMajorRepo->delete($levelMajor->id);

        $this->assertTrue($resp);
        $this->assertNull(LevelMajor::find($levelMajor->id), 'LevelMajor should not exist in DB');
    }
}

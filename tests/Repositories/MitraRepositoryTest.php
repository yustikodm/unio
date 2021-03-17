<?php namespace Tests\Repositories;

use App\Models\Mitra;
use App\Repositories\MitraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MitraRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MitraRepository
     */
    protected $mitraRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->mitraRepo = \App::make(MitraRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_mitra()
    {
        $mitra = factory(Mitra::class)->make()->toArray();

        $createdMitra = $this->mitraRepo->create($mitra);

        $createdMitra = $createdMitra->toArray();
        $this->assertArrayHasKey('id', $createdMitra);
        $this->assertNotNull($createdMitra['id'], 'Created Mitra must have id specified');
        $this->assertNotNull(Mitra::find($createdMitra['id']), 'Mitra with given id must be in DB');
        $this->assertModelData($mitra, $createdMitra);
    }

    /**
     * @test read
     */
    public function test_read_mitra()
    {
        $mitra = factory(Mitra::class)->create();

        $dbMitra = $this->mitraRepo->find($mitra->id);

        $dbMitra = $dbMitra->toArray();
        $this->assertModelData($mitra->toArray(), $dbMitra);
    }

    /**
     * @test update
     */
    public function test_update_mitra()
    {
        $mitra = factory(Mitra::class)->create();
        $fakeMitra = factory(Mitra::class)->make()->toArray();

        $updatedMitra = $this->mitraRepo->update($fakeMitra, $mitra->id);

        $this->assertModelData($fakeMitra, $updatedMitra->toArray());
        $dbMitra = $this->mitraRepo->find($mitra->id);
        $this->assertModelData($fakeMitra, $dbMitra->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_mitra()
    {
        $mitra = factory(Mitra::class)->create();

        $resp = $this->mitraRepo->delete($mitra->id);

        $this->assertTrue($resp);
        $this->assertNull(Mitra::find($mitra->id), 'Mitra should not exist in DB');
    }
}

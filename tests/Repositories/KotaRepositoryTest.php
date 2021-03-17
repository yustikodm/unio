<?php namespace Tests\Repositories;

use App\Models\Kota;
use App\Repositories\KotaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KotaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KotaRepository
     */
    protected $kotaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kotaRepo = \App::make(KotaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kota()
    {
        $kota = factory(Kota::class)->make()->toArray();

        $createdKota = $this->kotaRepo->create($kota);

        $createdKota = $createdKota->toArray();
        $this->assertArrayHasKey('id', $createdKota);
        $this->assertNotNull($createdKota['id'], 'Created Kota must have id specified');
        $this->assertNotNull(Kota::find($createdKota['id']), 'Kota with given id must be in DB');
        $this->assertModelData($kota, $createdKota);
    }

    /**
     * @test read
     */
    public function test_read_kota()
    {
        $kota = factory(Kota::class)->create();

        $dbKota = $this->kotaRepo->find($kota->id);

        $dbKota = $dbKota->toArray();
        $this->assertModelData($kota->toArray(), $dbKota);
    }

    /**
     * @test update
     */
    public function test_update_kota()
    {
        $kota = factory(Kota::class)->create();
        $fakeKota = factory(Kota::class)->make()->toArray();

        $updatedKota = $this->kotaRepo->update($fakeKota, $kota->id);

        $this->assertModelData($fakeKota, $updatedKota->toArray());
        $dbKota = $this->kotaRepo->find($kota->id);
        $this->assertModelData($fakeKota, $dbKota->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kota()
    {
        $kota = factory(Kota::class)->create();

        $resp = $this->kotaRepo->delete($kota->id);

        $this->assertTrue($resp);
        $this->assertNull(Kota::find($kota->id), 'Kota should not exist in DB');
    }
}

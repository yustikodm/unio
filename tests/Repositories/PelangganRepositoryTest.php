<?php namespace Tests\Repositories;

use App\Models\Pelanggan;
use App\Repositories\PelangganRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PelangganRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PelangganRepository
     */
    protected $pelangganRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pelangganRepo = \App::make(PelangganRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->make()->toArray();

        $createdPelanggan = $this->pelangganRepo->create($pelanggan);

        $createdPelanggan = $createdPelanggan->toArray();
        $this->assertArrayHasKey('id', $createdPelanggan);
        $this->assertNotNull($createdPelanggan['id'], 'Created Pelanggan must have id specified');
        $this->assertNotNull(Pelanggan::find($createdPelanggan['id']), 'Pelanggan with given id must be in DB');
        $this->assertModelData($pelanggan, $createdPelanggan);
    }

    /**
     * @test read
     */
    public function test_read_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();

        $dbPelanggan = $this->pelangganRepo->find($pelanggan->id);

        $dbPelanggan = $dbPelanggan->toArray();
        $this->assertModelData($pelanggan->toArray(), $dbPelanggan);
    }

    /**
     * @test update
     */
    public function test_update_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();
        $fakePelanggan = factory(Pelanggan::class)->make()->toArray();

        $updatedPelanggan = $this->pelangganRepo->update($fakePelanggan, $pelanggan->id);

        $this->assertModelData($fakePelanggan, $updatedPelanggan->toArray());
        $dbPelanggan = $this->pelangganRepo->find($pelanggan->id);
        $this->assertModelData($fakePelanggan, $dbPelanggan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();

        $resp = $this->pelangganRepo->delete($pelanggan->id);

        $this->assertTrue($resp);
        $this->assertNull(Pelanggan::find($pelanggan->id), 'Pelanggan should not exist in DB');
    }
}

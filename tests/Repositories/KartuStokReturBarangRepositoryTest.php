<?php namespace Tests\Repositories;

use App\Models\KartuStokReturBarang;
use App\Repositories\KartuStokReturBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KartuStokReturBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KartuStokReturBarangRepository
     */
    protected $kartuStokReturBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kartuStokReturBarangRepo = \App::make(KartuStokReturBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->make()->toArray();

        $createdKartuStokReturBarang = $this->kartuStokReturBarangRepo->create($kartuStokReturBarang);

        $createdKartuStokReturBarang = $createdKartuStokReturBarang->toArray();
        $this->assertArrayHasKey('id', $createdKartuStokReturBarang);
        $this->assertNotNull($createdKartuStokReturBarang['id'], 'Created KartuStokReturBarang must have id specified');
        $this->assertNotNull(KartuStokReturBarang::find($createdKartuStokReturBarang['id']), 'KartuStokReturBarang with given id must be in DB');
        $this->assertModelData($kartuStokReturBarang, $createdKartuStokReturBarang);
    }

    /**
     * @test read
     */
    public function test_read_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();

        $dbKartuStokReturBarang = $this->kartuStokReturBarangRepo->find($kartuStokReturBarang->id);

        $dbKartuStokReturBarang = $dbKartuStokReturBarang->toArray();
        $this->assertModelData($kartuStokReturBarang->toArray(), $dbKartuStokReturBarang);
    }

    /**
     * @test update
     */
    public function test_update_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();
        $fakeKartuStokReturBarang = factory(KartuStokReturBarang::class)->make()->toArray();

        $updatedKartuStokReturBarang = $this->kartuStokReturBarangRepo->update($fakeKartuStokReturBarang, $kartuStokReturBarang->id);

        $this->assertModelData($fakeKartuStokReturBarang, $updatedKartuStokReturBarang->toArray());
        $dbKartuStokReturBarang = $this->kartuStokReturBarangRepo->find($kartuStokReturBarang->id);
        $this->assertModelData($fakeKartuStokReturBarang, $dbKartuStokReturBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();

        $resp = $this->kartuStokReturBarangRepo->delete($kartuStokReturBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(KartuStokReturBarang::find($kartuStokReturBarang->id), 'KartuStokReturBarang should not exist in DB');
    }
}

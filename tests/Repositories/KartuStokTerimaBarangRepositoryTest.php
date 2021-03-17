<?php namespace Tests\Repositories;

use App\Models\KartuStokTerimaBarang;
use App\Repositories\KartuStokTerimaBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KartuStokTerimaBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KartuStokTerimaBarangRepository
     */
    protected $kartuStokTerimaBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kartuStokTerimaBarangRepo = \App::make(KartuStokTerimaBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->make()->toArray();

        $createdKartuStokTerimaBarang = $this->kartuStokTerimaBarangRepo->create($kartuStokTerimaBarang);

        $createdKartuStokTerimaBarang = $createdKartuStokTerimaBarang->toArray();
        $this->assertArrayHasKey('id', $createdKartuStokTerimaBarang);
        $this->assertNotNull($createdKartuStokTerimaBarang['id'], 'Created KartuStokTerimaBarang must have id specified');
        $this->assertNotNull(KartuStokTerimaBarang::find($createdKartuStokTerimaBarang['id']), 'KartuStokTerimaBarang with given id must be in DB');
        $this->assertModelData($kartuStokTerimaBarang, $createdKartuStokTerimaBarang);
    }

    /**
     * @test read
     */
    public function test_read_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();

        $dbKartuStokTerimaBarang = $this->kartuStokTerimaBarangRepo->find($kartuStokTerimaBarang->id);

        $dbKartuStokTerimaBarang = $dbKartuStokTerimaBarang->toArray();
        $this->assertModelData($kartuStokTerimaBarang->toArray(), $dbKartuStokTerimaBarang);
    }

    /**
     * @test update
     */
    public function test_update_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();
        $fakeKartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->make()->toArray();

        $updatedKartuStokTerimaBarang = $this->kartuStokTerimaBarangRepo->update($fakeKartuStokTerimaBarang, $kartuStokTerimaBarang->id);

        $this->assertModelData($fakeKartuStokTerimaBarang, $updatedKartuStokTerimaBarang->toArray());
        $dbKartuStokTerimaBarang = $this->kartuStokTerimaBarangRepo->find($kartuStokTerimaBarang->id);
        $this->assertModelData($fakeKartuStokTerimaBarang, $dbKartuStokTerimaBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();

        $resp = $this->kartuStokTerimaBarangRepo->delete($kartuStokTerimaBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(KartuStokTerimaBarang::find($kartuStokTerimaBarang->id), 'KartuStokTerimaBarang should not exist in DB');
    }
}

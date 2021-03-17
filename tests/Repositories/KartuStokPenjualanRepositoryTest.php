<?php namespace Tests\Repositories;

use App\Models\KartuStokPenjualan;
use App\Repositories\KartuStokPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KartuStokPenjualanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KartuStokPenjualanRepository
     */
    protected $kartuStokPenjualanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kartuStokPenjualanRepo = \App::make(KartuStokPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->make()->toArray();

        $createdKartuStokPenjualan = $this->kartuStokPenjualanRepo->create($kartuStokPenjualan);

        $createdKartuStokPenjualan = $createdKartuStokPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdKartuStokPenjualan);
        $this->assertNotNull($createdKartuStokPenjualan['id'], 'Created KartuStokPenjualan must have id specified');
        $this->assertNotNull(KartuStokPenjualan::find($createdKartuStokPenjualan['id']), 'KartuStokPenjualan with given id must be in DB');
        $this->assertModelData($kartuStokPenjualan, $createdKartuStokPenjualan);
    }

    /**
     * @test read
     */
    public function test_read_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();

        $dbKartuStokPenjualan = $this->kartuStokPenjualanRepo->find($kartuStokPenjualan->id);

        $dbKartuStokPenjualan = $dbKartuStokPenjualan->toArray();
        $this->assertModelData($kartuStokPenjualan->toArray(), $dbKartuStokPenjualan);
    }

    /**
     * @test update
     */
    public function test_update_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();
        $fakeKartuStokPenjualan = factory(KartuStokPenjualan::class)->make()->toArray();

        $updatedKartuStokPenjualan = $this->kartuStokPenjualanRepo->update($fakeKartuStokPenjualan, $kartuStokPenjualan->id);

        $this->assertModelData($fakeKartuStokPenjualan, $updatedKartuStokPenjualan->toArray());
        $dbKartuStokPenjualan = $this->kartuStokPenjualanRepo->find($kartuStokPenjualan->id);
        $this->assertModelData($fakeKartuStokPenjualan, $dbKartuStokPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();

        $resp = $this->kartuStokPenjualanRepo->delete($kartuStokPenjualan->id);

        $this->assertTrue($resp);
        $this->assertNull(KartuStokPenjualan::find($kartuStokPenjualan->id), 'KartuStokPenjualan should not exist in DB');
    }
}

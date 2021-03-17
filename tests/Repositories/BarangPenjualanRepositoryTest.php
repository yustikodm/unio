<?php namespace Tests\Repositories;

use App\Models\BarangPenjualan;
use App\Repositories\BarangPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangPenjualanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangPenjualanRepository
     */
    protected $barangPenjualanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangPenjualanRepo = \App::make(BarangPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->make()->toArray();

        $createdBarangPenjualan = $this->barangPenjualanRepo->create($barangPenjualan);

        $createdBarangPenjualan = $createdBarangPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdBarangPenjualan);
        $this->assertNotNull($createdBarangPenjualan['id'], 'Created BarangPenjualan must have id specified');
        $this->assertNotNull(BarangPenjualan::find($createdBarangPenjualan['id']), 'BarangPenjualan with given id must be in DB');
        $this->assertModelData($barangPenjualan, $createdBarangPenjualan);
    }

    /**
     * @test read
     */
    public function test_read_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();

        $dbBarangPenjualan = $this->barangPenjualanRepo->find($barangPenjualan->id);

        $dbBarangPenjualan = $dbBarangPenjualan->toArray();
        $this->assertModelData($barangPenjualan->toArray(), $dbBarangPenjualan);
    }

    /**
     * @test update
     */
    public function test_update_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();
        $fakeBarangPenjualan = factory(BarangPenjualan::class)->make()->toArray();

        $updatedBarangPenjualan = $this->barangPenjualanRepo->update($fakeBarangPenjualan, $barangPenjualan->id);

        $this->assertModelData($fakeBarangPenjualan, $updatedBarangPenjualan->toArray());
        $dbBarangPenjualan = $this->barangPenjualanRepo->find($barangPenjualan->id);
        $this->assertModelData($fakeBarangPenjualan, $dbBarangPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();

        $resp = $this->barangPenjualanRepo->delete($barangPenjualan->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangPenjualan::find($barangPenjualan->id), 'BarangPenjualan should not exist in DB');
    }
}

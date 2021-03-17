<?php namespace Tests\Repositories;

use App\Models\DetailPenjualan;
use App\Repositories\DetailPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DetailPenjualanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailPenjualanRepository
     */
    protected $detailPenjualanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->detailPenjualanRepo = \App::make(DetailPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->make()->toArray();

        $createdDetailPenjualan = $this->detailPenjualanRepo->create($detailPenjualan);

        $createdDetailPenjualan = $createdDetailPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdDetailPenjualan);
        $this->assertNotNull($createdDetailPenjualan['id'], 'Created DetailPenjualan must have id specified');
        $this->assertNotNull(DetailPenjualan::find($createdDetailPenjualan['id']), 'DetailPenjualan with given id must be in DB');
        $this->assertModelData($detailPenjualan, $createdDetailPenjualan);
    }

    /**
     * @test read
     */
    public function test_read_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();

        $dbDetailPenjualan = $this->detailPenjualanRepo->find($detailPenjualan->id);

        $dbDetailPenjualan = $dbDetailPenjualan->toArray();
        $this->assertModelData($detailPenjualan->toArray(), $dbDetailPenjualan);
    }

    /**
     * @test update
     */
    public function test_update_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();
        $fakeDetailPenjualan = factory(DetailPenjualan::class)->make()->toArray();

        $updatedDetailPenjualan = $this->detailPenjualanRepo->update($fakeDetailPenjualan, $detailPenjualan->id);

        $this->assertModelData($fakeDetailPenjualan, $updatedDetailPenjualan->toArray());
        $dbDetailPenjualan = $this->detailPenjualanRepo->find($detailPenjualan->id);
        $this->assertModelData($fakeDetailPenjualan, $dbDetailPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();

        $resp = $this->detailPenjualanRepo->delete($detailPenjualan->id);

        $this->assertTrue($resp);
        $this->assertNull(DetailPenjualan::find($detailPenjualan->id), 'DetailPenjualan should not exist in DB');
    }
}

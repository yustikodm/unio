<?php namespace Tests\Repositories;

use App\Models\Penjualan;
use App\Repositories\PenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PenjualanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PenjualanRepository
     */
    protected $penjualanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->penjualanRepo = \App::make(PenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_penjualan()
    {
        $penjualan = factory(Penjualan::class)->make()->toArray();

        $createdPenjualan = $this->penjualanRepo->create($penjualan);

        $createdPenjualan = $createdPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdPenjualan);
        $this->assertNotNull($createdPenjualan['id'], 'Created Penjualan must have id specified');
        $this->assertNotNull(Penjualan::find($createdPenjualan['id']), 'Penjualan with given id must be in DB');
        $this->assertModelData($penjualan, $createdPenjualan);
    }

    /**
     * @test read
     */
    public function test_read_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();

        $dbPenjualan = $this->penjualanRepo->find($penjualan->id);

        $dbPenjualan = $dbPenjualan->toArray();
        $this->assertModelData($penjualan->toArray(), $dbPenjualan);
    }

    /**
     * @test update
     */
    public function test_update_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();
        $fakePenjualan = factory(Penjualan::class)->make()->toArray();

        $updatedPenjualan = $this->penjualanRepo->update($fakePenjualan, $penjualan->id);

        $this->assertModelData($fakePenjualan, $updatedPenjualan->toArray());
        $dbPenjualan = $this->penjualanRepo->find($penjualan->id);
        $this->assertModelData($fakePenjualan, $dbPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();

        $resp = $this->penjualanRepo->delete($penjualan->id);

        $this->assertTrue($resp);
        $this->assertNull(Penjualan::find($penjualan->id), 'Penjualan should not exist in DB');
    }
}

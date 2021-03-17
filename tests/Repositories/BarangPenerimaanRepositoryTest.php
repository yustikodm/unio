<?php namespace Tests\Repositories;

use App\Models\BarangPenerimaan;
use App\Repositories\BarangPenerimaanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangPenerimaanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangPenerimaanRepository
     */
    protected $barangPenerimaanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangPenerimaanRepo = \App::make(BarangPenerimaanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->make()->toArray();

        $createdBarangPenerimaan = $this->barangPenerimaanRepo->create($barangPenerimaan);

        $createdBarangPenerimaan = $createdBarangPenerimaan->toArray();
        $this->assertArrayHasKey('id', $createdBarangPenerimaan);
        $this->assertNotNull($createdBarangPenerimaan['id'], 'Created BarangPenerimaan must have id specified');
        $this->assertNotNull(BarangPenerimaan::find($createdBarangPenerimaan['id']), 'BarangPenerimaan with given id must be in DB');
        $this->assertModelData($barangPenerimaan, $createdBarangPenerimaan);
    }

    /**
     * @test read
     */
    public function test_read_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();

        $dbBarangPenerimaan = $this->barangPenerimaanRepo->find($barangPenerimaan->id);

        $dbBarangPenerimaan = $dbBarangPenerimaan->toArray();
        $this->assertModelData($barangPenerimaan->toArray(), $dbBarangPenerimaan);
    }

    /**
     * @test update
     */
    public function test_update_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();
        $fakeBarangPenerimaan = factory(BarangPenerimaan::class)->make()->toArray();

        $updatedBarangPenerimaan = $this->barangPenerimaanRepo->update($fakeBarangPenerimaan, $barangPenerimaan->id);

        $this->assertModelData($fakeBarangPenerimaan, $updatedBarangPenerimaan->toArray());
        $dbBarangPenerimaan = $this->barangPenerimaanRepo->find($barangPenerimaan->id);
        $this->assertModelData($fakeBarangPenerimaan, $dbBarangPenerimaan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();

        $resp = $this->barangPenerimaanRepo->delete($barangPenerimaan->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangPenerimaan::find($barangPenerimaan->id), 'BarangPenerimaan should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\BarangRetur;
use App\Repositories\BarangReturRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangReturRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangReturRepository
     */
    protected $barangReturRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangReturRepo = \App::make(BarangReturRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->make()->toArray();

        $createdBarangRetur = $this->barangReturRepo->create($barangRetur);

        $createdBarangRetur = $createdBarangRetur->toArray();
        $this->assertArrayHasKey('id', $createdBarangRetur);
        $this->assertNotNull($createdBarangRetur['id'], 'Created BarangRetur must have id specified');
        $this->assertNotNull(BarangRetur::find($createdBarangRetur['id']), 'BarangRetur with given id must be in DB');
        $this->assertModelData($barangRetur, $createdBarangRetur);
    }

    /**
     * @test read
     */
    public function test_read_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();

        $dbBarangRetur = $this->barangReturRepo->find($barangRetur->id);

        $dbBarangRetur = $dbBarangRetur->toArray();
        $this->assertModelData($barangRetur->toArray(), $dbBarangRetur);
    }

    /**
     * @test update
     */
    public function test_update_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();
        $fakeBarangRetur = factory(BarangRetur::class)->make()->toArray();

        $updatedBarangRetur = $this->barangReturRepo->update($fakeBarangRetur, $barangRetur->id);

        $this->assertModelData($fakeBarangRetur, $updatedBarangRetur->toArray());
        $dbBarangRetur = $this->barangReturRepo->find($barangRetur->id);
        $this->assertModelData($fakeBarangRetur, $dbBarangRetur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();

        $resp = $this->barangReturRepo->delete($barangRetur->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangRetur::find($barangRetur->id), 'BarangRetur should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\BarangKirim;
use App\Repositories\BarangKirimRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangKirimRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangKirimRepository
     */
    protected $barangKirimRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangKirimRepo = \App::make(BarangKirimRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->make()->toArray();

        $createdBarangKirim = $this->barangKirimRepo->create($barangKirim);

        $createdBarangKirim = $createdBarangKirim->toArray();
        $this->assertArrayHasKey('id', $createdBarangKirim);
        $this->assertNotNull($createdBarangKirim['id'], 'Created BarangKirim must have id specified');
        $this->assertNotNull(BarangKirim::find($createdBarangKirim['id']), 'BarangKirim with given id must be in DB');
        $this->assertModelData($barangKirim, $createdBarangKirim);
    }

    /**
     * @test read
     */
    public function test_read_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();

        $dbBarangKirim = $this->barangKirimRepo->find($barangKirim->id);

        $dbBarangKirim = $dbBarangKirim->toArray();
        $this->assertModelData($barangKirim->toArray(), $dbBarangKirim);
    }

    /**
     * @test update
     */
    public function test_update_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();
        $fakeBarangKirim = factory(BarangKirim::class)->make()->toArray();

        $updatedBarangKirim = $this->barangKirimRepo->update($fakeBarangKirim, $barangKirim->id);

        $this->assertModelData($fakeBarangKirim, $updatedBarangKirim->toArray());
        $dbBarangKirim = $this->barangKirimRepo->find($barangKirim->id);
        $this->assertModelData($fakeBarangKirim, $dbBarangKirim->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();

        $resp = $this->barangKirimRepo->delete($barangKirim->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangKirim::find($barangKirim->id), 'BarangKirim should not exist in DB');
    }
}

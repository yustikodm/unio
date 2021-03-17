<?php namespace Tests\Repositories;

use App\Models\BarangTerima;
use App\Repositories\BarangTerimaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangTerimaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangTerimaRepository
     */
    protected $barangTerimaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangTerimaRepo = \App::make(BarangTerimaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->make()->toArray();

        $createdBarangTerima = $this->barangTerimaRepo->create($barangTerima);

        $createdBarangTerima = $createdBarangTerima->toArray();
        $this->assertArrayHasKey('id', $createdBarangTerima);
        $this->assertNotNull($createdBarangTerima['id'], 'Created BarangTerima must have id specified');
        $this->assertNotNull(BarangTerima::find($createdBarangTerima['id']), 'BarangTerima with given id must be in DB');
        $this->assertModelData($barangTerima, $createdBarangTerima);
    }

    /**
     * @test read
     */
    public function test_read_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();

        $dbBarangTerima = $this->barangTerimaRepo->find($barangTerima->id);

        $dbBarangTerima = $dbBarangTerima->toArray();
        $this->assertModelData($barangTerima->toArray(), $dbBarangTerima);
    }

    /**
     * @test update
     */
    public function test_update_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();
        $fakeBarangTerima = factory(BarangTerima::class)->make()->toArray();

        $updatedBarangTerima = $this->barangTerimaRepo->update($fakeBarangTerima, $barangTerima->id);

        $this->assertModelData($fakeBarangTerima, $updatedBarangTerima->toArray());
        $dbBarangTerima = $this->barangTerimaRepo->find($barangTerima->id);
        $this->assertModelData($fakeBarangTerima, $dbBarangTerima->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();

        $resp = $this->barangTerimaRepo->delete($barangTerima->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangTerima::find($barangTerima->id), 'BarangTerima should not exist in DB');
    }
}

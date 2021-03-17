<?php namespace Tests\Repositories;

use App\Models\Barang;
use App\Repositories\BarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangRepository
     */
    protected $barangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangRepo = \App::make(BarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang()
    {
        $barang = factory(Barang::class)->make()->toArray();

        $createdBarang = $this->barangRepo->create($barang);

        $createdBarang = $createdBarang->toArray();
        $this->assertArrayHasKey('id', $createdBarang);
        $this->assertNotNull($createdBarang['id'], 'Created Barang must have id specified');
        $this->assertNotNull(Barang::find($createdBarang['id']), 'Barang with given id must be in DB');
        $this->assertModelData($barang, $createdBarang);
    }

    /**
     * @test read
     */
    public function test_read_barang()
    {
        $barang = factory(Barang::class)->create();

        $dbBarang = $this->barangRepo->find($barang->id);

        $dbBarang = $dbBarang->toArray();
        $this->assertModelData($barang->toArray(), $dbBarang);
    }

    /**
     * @test update
     */
    public function test_update_barang()
    {
        $barang = factory(Barang::class)->create();
        $fakeBarang = factory(Barang::class)->make()->toArray();

        $updatedBarang = $this->barangRepo->update($fakeBarang, $barang->id);

        $this->assertModelData($fakeBarang, $updatedBarang->toArray());
        $dbBarang = $this->barangRepo->find($barang->id);
        $this->assertModelData($fakeBarang, $dbBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang()
    {
        $barang = factory(Barang::class)->create();

        $resp = $this->barangRepo->delete($barang->id);

        $this->assertTrue($resp);
        $this->assertNull(Barang::find($barang->id), 'Barang should not exist in DB');
    }
}

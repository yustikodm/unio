<?php namespace Tests\Repositories;

use App\Models\KategoriBarang;
use App\Repositories\KategoriBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KategoriBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KategoriBarangRepository
     */
    protected $kategoriBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kategoriBarangRepo = \App::make(KategoriBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->make()->toArray();

        $createdKategoriBarang = $this->kategoriBarangRepo->create($kategoriBarang);

        $createdKategoriBarang = $createdKategoriBarang->toArray();
        $this->assertArrayHasKey('id', $createdKategoriBarang);
        $this->assertNotNull($createdKategoriBarang['id'], 'Created KategoriBarang must have id specified');
        $this->assertNotNull(KategoriBarang::find($createdKategoriBarang['id']), 'KategoriBarang with given id must be in DB');
        $this->assertModelData($kategoriBarang, $createdKategoriBarang);
    }

    /**
     * @test read
     */
    public function test_read_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();

        $dbKategoriBarang = $this->kategoriBarangRepo->find($kategoriBarang->id);

        $dbKategoriBarang = $dbKategoriBarang->toArray();
        $this->assertModelData($kategoriBarang->toArray(), $dbKategoriBarang);
    }

    /**
     * @test update
     */
    public function test_update_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();
        $fakeKategoriBarang = factory(KategoriBarang::class)->make()->toArray();

        $updatedKategoriBarang = $this->kategoriBarangRepo->update($fakeKategoriBarang, $kategoriBarang->id);

        $this->assertModelData($fakeKategoriBarang, $updatedKategoriBarang->toArray());
        $dbKategoriBarang = $this->kategoriBarangRepo->find($kategoriBarang->id);
        $this->assertModelData($fakeKategoriBarang, $dbKategoriBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();

        $resp = $this->kategoriBarangRepo->delete($kategoriBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(KategoriBarang::find($kategoriBarang->id), 'KategoriBarang should not exist in DB');
    }
}

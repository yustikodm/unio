<?php namespace Tests\Repositories;

use App\Models\SubkategoriBarang;
use App\Repositories\SubkategoriBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubkategoriBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubkategoriBarangRepository
     */
    protected $subkategoriBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subkategoriBarangRepo = \App::make(SubkategoriBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->make()->toArray();

        $createdSubkategoriBarang = $this->subkategoriBarangRepo->create($subkategoriBarang);

        $createdSubkategoriBarang = $createdSubkategoriBarang->toArray();
        $this->assertArrayHasKey('id', $createdSubkategoriBarang);
        $this->assertNotNull($createdSubkategoriBarang['id'], 'Created SubkategoriBarang must have id specified');
        $this->assertNotNull(SubkategoriBarang::find($createdSubkategoriBarang['id']), 'SubkategoriBarang with given id must be in DB');
        $this->assertModelData($subkategoriBarang, $createdSubkategoriBarang);
    }

    /**
     * @test read
     */
    public function test_read_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();

        $dbSubkategoriBarang = $this->subkategoriBarangRepo->find($subkategoriBarang->id);

        $dbSubkategoriBarang = $dbSubkategoriBarang->toArray();
        $this->assertModelData($subkategoriBarang->toArray(), $dbSubkategoriBarang);
    }

    /**
     * @test update
     */
    public function test_update_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();
        $fakeSubkategoriBarang = factory(SubkategoriBarang::class)->make()->toArray();

        $updatedSubkategoriBarang = $this->subkategoriBarangRepo->update($fakeSubkategoriBarang, $subkategoriBarang->id);

        $this->assertModelData($fakeSubkategoriBarang, $updatedSubkategoriBarang->toArray());
        $dbSubkategoriBarang = $this->subkategoriBarangRepo->find($subkategoriBarang->id);
        $this->assertModelData($fakeSubkategoriBarang, $dbSubkategoriBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();

        $resp = $this->subkategoriBarangRepo->delete($subkategoriBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(SubkategoriBarang::find($subkategoriBarang->id), 'SubkategoriBarang should not exist in DB');
    }
}

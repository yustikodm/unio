<?php namespace Tests\Repositories;

use App\Models\SatuanBarang;
use App\Repositories\SatuanBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SatuanBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SatuanBarangRepository
     */
    protected $satuanBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->satuanBarangRepo = \App::make(SatuanBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->make()->toArray();

        $createdSatuanBarang = $this->satuanBarangRepo->create($satuanBarang);

        $createdSatuanBarang = $createdSatuanBarang->toArray();
        $this->assertArrayHasKey('id', $createdSatuanBarang);
        $this->assertNotNull($createdSatuanBarang['id'], 'Created SatuanBarang must have id specified');
        $this->assertNotNull(SatuanBarang::find($createdSatuanBarang['id']), 'SatuanBarang with given id must be in DB');
        $this->assertModelData($satuanBarang, $createdSatuanBarang);
    }

    /**
     * @test read
     */
    public function test_read_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();

        $dbSatuanBarang = $this->satuanBarangRepo->find($satuanBarang->id);

        $dbSatuanBarang = $dbSatuanBarang->toArray();
        $this->assertModelData($satuanBarang->toArray(), $dbSatuanBarang);
    }

    /**
     * @test update
     */
    public function test_update_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();
        $fakeSatuanBarang = factory(SatuanBarang::class)->make()->toArray();

        $updatedSatuanBarang = $this->satuanBarangRepo->update($fakeSatuanBarang, $satuanBarang->id);

        $this->assertModelData($fakeSatuanBarang, $updatedSatuanBarang->toArray());
        $dbSatuanBarang = $this->satuanBarangRepo->find($satuanBarang->id);
        $this->assertModelData($fakeSatuanBarang, $dbSatuanBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();

        $resp = $this->satuanBarangRepo->delete($satuanBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(SatuanBarang::find($satuanBarang->id), 'SatuanBarang should not exist in DB');
    }
}

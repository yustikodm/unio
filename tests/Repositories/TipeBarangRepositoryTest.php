<?php namespace Tests\Repositories;

use App\Models\TipeBarang;
use App\Repositories\TipeBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TipeBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipeBarangRepository
     */
    protected $tipeBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipeBarangRepo = \App::make(TipeBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->make()->toArray();

        $createdTipeBarang = $this->tipeBarangRepo->create($tipeBarang);

        $createdTipeBarang = $createdTipeBarang->toArray();
        $this->assertArrayHasKey('id', $createdTipeBarang);
        $this->assertNotNull($createdTipeBarang['id'], 'Created TipeBarang must have id specified');
        $this->assertNotNull(TipeBarang::find($createdTipeBarang['id']), 'TipeBarang with given id must be in DB');
        $this->assertModelData($tipeBarang, $createdTipeBarang);
    }

    /**
     * @test read
     */
    public function test_read_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();

        $dbTipeBarang = $this->tipeBarangRepo->find($tipeBarang->id);

        $dbTipeBarang = $dbTipeBarang->toArray();
        $this->assertModelData($tipeBarang->toArray(), $dbTipeBarang);
    }

    /**
     * @test update
     */
    public function test_update_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();
        $fakeTipeBarang = factory(TipeBarang::class)->make()->toArray();

        $updatedTipeBarang = $this->tipeBarangRepo->update($fakeTipeBarang, $tipeBarang->id);

        $this->assertModelData($fakeTipeBarang, $updatedTipeBarang->toArray());
        $dbTipeBarang = $this->tipeBarangRepo->find($tipeBarang->id);
        $this->assertModelData($fakeTipeBarang, $dbTipeBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();

        $resp = $this->tipeBarangRepo->delete($tipeBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(TipeBarang::find($tipeBarang->id), 'TipeBarang should not exist in DB');
    }
}

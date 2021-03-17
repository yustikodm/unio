<?php namespace Tests\Repositories;

use App\Models\TerimaBarang;
use App\Repositories\TerimaBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TerimaBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TerimaBarangRepository
     */
    protected $terimaBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->terimaBarangRepo = \App::make(TerimaBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->make()->toArray();

        $createdTerimaBarang = $this->terimaBarangRepo->create($terimaBarang);

        $createdTerimaBarang = $createdTerimaBarang->toArray();
        $this->assertArrayHasKey('id', $createdTerimaBarang);
        $this->assertNotNull($createdTerimaBarang['id'], 'Created TerimaBarang must have id specified');
        $this->assertNotNull(TerimaBarang::find($createdTerimaBarang['id']), 'TerimaBarang with given id must be in DB');
        $this->assertModelData($terimaBarang, $createdTerimaBarang);
    }

    /**
     * @test read
     */
    public function test_read_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();

        $dbTerimaBarang = $this->terimaBarangRepo->find($terimaBarang->id);

        $dbTerimaBarang = $dbTerimaBarang->toArray();
        $this->assertModelData($terimaBarang->toArray(), $dbTerimaBarang);
    }

    /**
     * @test update
     */
    public function test_update_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();
        $fakeTerimaBarang = factory(TerimaBarang::class)->make()->toArray();

        $updatedTerimaBarang = $this->terimaBarangRepo->update($fakeTerimaBarang, $terimaBarang->id);

        $this->assertModelData($fakeTerimaBarang, $updatedTerimaBarang->toArray());
        $dbTerimaBarang = $this->terimaBarangRepo->find($terimaBarang->id);
        $this->assertModelData($fakeTerimaBarang, $dbTerimaBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();

        $resp = $this->terimaBarangRepo->delete($terimaBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(TerimaBarang::find($terimaBarang->id), 'TerimaBarang should not exist in DB');
    }
}

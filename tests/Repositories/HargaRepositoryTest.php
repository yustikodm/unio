<?php namespace Tests\Repositories;

use App\Models\Harga;
use App\Repositories\HargaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HargaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HargaRepository
     */
    protected $hargaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hargaRepo = \App::make(HargaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_harga()
    {
        $harga = factory(Harga::class)->make()->toArray();

        $createdHarga = $this->hargaRepo->create($harga);

        $createdHarga = $createdHarga->toArray();
        $this->assertArrayHasKey('id', $createdHarga);
        $this->assertNotNull($createdHarga['id'], 'Created Harga must have id specified');
        $this->assertNotNull(Harga::find($createdHarga['id']), 'Harga with given id must be in DB');
        $this->assertModelData($harga, $createdHarga);
    }

    /**
     * @test read
     */
    public function test_read_harga()
    {
        $harga = factory(Harga::class)->create();

        $dbHarga = $this->hargaRepo->find($harga->id);

        $dbHarga = $dbHarga->toArray();
        $this->assertModelData($harga->toArray(), $dbHarga);
    }

    /**
     * @test update
     */
    public function test_update_harga()
    {
        $harga = factory(Harga::class)->create();
        $fakeHarga = factory(Harga::class)->make()->toArray();

        $updatedHarga = $this->hargaRepo->update($fakeHarga, $harga->id);

        $this->assertModelData($fakeHarga, $updatedHarga->toArray());
        $dbHarga = $this->hargaRepo->find($harga->id);
        $this->assertModelData($fakeHarga, $dbHarga->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_harga()
    {
        $harga = factory(Harga::class)->create();

        $resp = $this->hargaRepo->delete($harga->id);

        $this->assertTrue($resp);
        $this->assertNull(Harga::find($harga->id), 'Harga should not exist in DB');
    }
}

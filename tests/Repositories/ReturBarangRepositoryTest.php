<?php namespace Tests\Repositories;

use App\Models\ReturBarang;
use App\Repositories\ReturBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ReturBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReturBarangRepository
     */
    protected $returBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->returBarangRepo = \App::make(ReturBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->make()->toArray();

        $createdReturBarang = $this->returBarangRepo->create($returBarang);

        $createdReturBarang = $createdReturBarang->toArray();
        $this->assertArrayHasKey('id', $createdReturBarang);
        $this->assertNotNull($createdReturBarang['id'], 'Created ReturBarang must have id specified');
        $this->assertNotNull(ReturBarang::find($createdReturBarang['id']), 'ReturBarang with given id must be in DB');
        $this->assertModelData($returBarang, $createdReturBarang);
    }

    /**
     * @test read
     */
    public function test_read_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();

        $dbReturBarang = $this->returBarangRepo->find($returBarang->id);

        $dbReturBarang = $dbReturBarang->toArray();
        $this->assertModelData($returBarang->toArray(), $dbReturBarang);
    }

    /**
     * @test update
     */
    public function test_update_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();
        $fakeReturBarang = factory(ReturBarang::class)->make()->toArray();

        $updatedReturBarang = $this->returBarangRepo->update($fakeReturBarang, $returBarang->id);

        $this->assertModelData($fakeReturBarang, $updatedReturBarang->toArray());
        $dbReturBarang = $this->returBarangRepo->find($returBarang->id);
        $this->assertModelData($fakeReturBarang, $dbReturBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();

        $resp = $this->returBarangRepo->delete($returBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(ReturBarang::find($returBarang->id), 'ReturBarang should not exist in DB');
    }
}

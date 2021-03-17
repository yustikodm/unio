<?php namespace Tests\Repositories;

use App\Models\MetodePembayaran;
use App\Repositories\MetodePembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MetodePembayaranRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MetodePembayaranRepository
     */
    protected $metodePembayaranRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->metodePembayaranRepo = \App::make(MetodePembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->make()->toArray();

        $createdMetodePembayaran = $this->metodePembayaranRepo->create($metodePembayaran);

        $createdMetodePembayaran = $createdMetodePembayaran->toArray();
        $this->assertArrayHasKey('id', $createdMetodePembayaran);
        $this->assertNotNull($createdMetodePembayaran['id'], 'Created MetodePembayaran must have id specified');
        $this->assertNotNull(MetodePembayaran::find($createdMetodePembayaran['id']), 'MetodePembayaran with given id must be in DB');
        $this->assertModelData($metodePembayaran, $createdMetodePembayaran);
    }

    /**
     * @test read
     */
    public function test_read_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();

        $dbMetodePembayaran = $this->metodePembayaranRepo->find($metodePembayaran->id);

        $dbMetodePembayaran = $dbMetodePembayaran->toArray();
        $this->assertModelData($metodePembayaran->toArray(), $dbMetodePembayaran);
    }

    /**
     * @test update
     */
    public function test_update_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();
        $fakeMetodePembayaran = factory(MetodePembayaran::class)->make()->toArray();

        $updatedMetodePembayaran = $this->metodePembayaranRepo->update($fakeMetodePembayaran, $metodePembayaran->id);

        $this->assertModelData($fakeMetodePembayaran, $updatedMetodePembayaran->toArray());
        $dbMetodePembayaran = $this->metodePembayaranRepo->find($metodePembayaran->id);
        $this->assertModelData($fakeMetodePembayaran, $dbMetodePembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();

        $resp = $this->metodePembayaranRepo->delete($metodePembayaran->id);

        $this->assertTrue($resp);
        $this->assertNull(MetodePembayaran::find($metodePembayaran->id), 'MetodePembayaran should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\KirimBarang;
use App\Repositories\KirimBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KirimBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KirimBarangRepository
     */
    protected $kirimBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kirimBarangRepo = \App::make(KirimBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->make()->toArray();

        $createdKirimBarang = $this->kirimBarangRepo->create($kirimBarang);

        $createdKirimBarang = $createdKirimBarang->toArray();
        $this->assertArrayHasKey('id', $createdKirimBarang);
        $this->assertNotNull($createdKirimBarang['id'], 'Created KirimBarang must have id specified');
        $this->assertNotNull(KirimBarang::find($createdKirimBarang['id']), 'KirimBarang with given id must be in DB');
        $this->assertModelData($kirimBarang, $createdKirimBarang);
    }

    /**
     * @test read
     */
    public function test_read_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();

        $dbKirimBarang = $this->kirimBarangRepo->find($kirimBarang->id);

        $dbKirimBarang = $dbKirimBarang->toArray();
        $this->assertModelData($kirimBarang->toArray(), $dbKirimBarang);
    }

    /**
     * @test update
     */
    public function test_update_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();
        $fakeKirimBarang = factory(KirimBarang::class)->make()->toArray();

        $updatedKirimBarang = $this->kirimBarangRepo->update($fakeKirimBarang, $kirimBarang->id);

        $this->assertModelData($fakeKirimBarang, $updatedKirimBarang->toArray());
        $dbKirimBarang = $this->kirimBarangRepo->find($kirimBarang->id);
        $this->assertModelData($fakeKirimBarang, $dbKirimBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();

        $resp = $this->kirimBarangRepo->delete($kirimBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(KirimBarang::find($kirimBarang->id), 'KirimBarang should not exist in DB');
    }
}

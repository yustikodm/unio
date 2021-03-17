<?php namespace Tests\Repositories;

use App\Models\KartuStokPenyesuaian;
use App\Repositories\KartuStokPenyesuaianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KartuStokPenyesuaianRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KartuStokPenyesuaianRepository
     */
    protected $kartuStokPenyesuaianRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kartuStokPenyesuaianRepo = \App::make(KartuStokPenyesuaianRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->make()->toArray();

        $createdKartuStokPenyesuaian = $this->kartuStokPenyesuaianRepo->create($kartuStokPenyesuaian);

        $createdKartuStokPenyesuaian = $createdKartuStokPenyesuaian->toArray();
        $this->assertArrayHasKey('id', $createdKartuStokPenyesuaian);
        $this->assertNotNull($createdKartuStokPenyesuaian['id'], 'Created KartuStokPenyesuaian must have id specified');
        $this->assertNotNull(KartuStokPenyesuaian::find($createdKartuStokPenyesuaian['id']), 'KartuStokPenyesuaian with given id must be in DB');
        $this->assertModelData($kartuStokPenyesuaian, $createdKartuStokPenyesuaian);
    }

    /**
     * @test read
     */
    public function test_read_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();

        $dbKartuStokPenyesuaian = $this->kartuStokPenyesuaianRepo->find($kartuStokPenyesuaian->id);

        $dbKartuStokPenyesuaian = $dbKartuStokPenyesuaian->toArray();
        $this->assertModelData($kartuStokPenyesuaian->toArray(), $dbKartuStokPenyesuaian);
    }

    /**
     * @test update
     */
    public function test_update_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();
        $fakeKartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->make()->toArray();

        $updatedKartuStokPenyesuaian = $this->kartuStokPenyesuaianRepo->update($fakeKartuStokPenyesuaian, $kartuStokPenyesuaian->id);

        $this->assertModelData($fakeKartuStokPenyesuaian, $updatedKartuStokPenyesuaian->toArray());
        $dbKartuStokPenyesuaian = $this->kartuStokPenyesuaianRepo->find($kartuStokPenyesuaian->id);
        $this->assertModelData($fakeKartuStokPenyesuaian, $dbKartuStokPenyesuaian->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();

        $resp = $this->kartuStokPenyesuaianRepo->delete($kartuStokPenyesuaian->id);

        $this->assertTrue($resp);
        $this->assertNull(KartuStokPenyesuaian::find($kartuStokPenyesuaian->id), 'KartuStokPenyesuaian should not exist in DB');
    }
}

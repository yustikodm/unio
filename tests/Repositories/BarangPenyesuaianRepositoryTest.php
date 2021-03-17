<?php namespace Tests\Repositories;

use App\Models\BarangPenyesuaian;
use App\Repositories\BarangPenyesuaianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangPenyesuaianRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangPenyesuaianRepository
     */
    protected $barangPenyesuaianRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangPenyesuaianRepo = \App::make(BarangPenyesuaianRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->make()->toArray();

        $createdBarangPenyesuaian = $this->barangPenyesuaianRepo->create($barangPenyesuaian);

        $createdBarangPenyesuaian = $createdBarangPenyesuaian->toArray();
        $this->assertArrayHasKey('id', $createdBarangPenyesuaian);
        $this->assertNotNull($createdBarangPenyesuaian['id'], 'Created BarangPenyesuaian must have id specified');
        $this->assertNotNull(BarangPenyesuaian::find($createdBarangPenyesuaian['id']), 'BarangPenyesuaian with given id must be in DB');
        $this->assertModelData($barangPenyesuaian, $createdBarangPenyesuaian);
    }

    /**
     * @test read
     */
    public function test_read_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();

        $dbBarangPenyesuaian = $this->barangPenyesuaianRepo->find($barangPenyesuaian->id);

        $dbBarangPenyesuaian = $dbBarangPenyesuaian->toArray();
        $this->assertModelData($barangPenyesuaian->toArray(), $dbBarangPenyesuaian);
    }

    /**
     * @test update
     */
    public function test_update_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();
        $fakeBarangPenyesuaian = factory(BarangPenyesuaian::class)->make()->toArray();

        $updatedBarangPenyesuaian = $this->barangPenyesuaianRepo->update($fakeBarangPenyesuaian, $barangPenyesuaian->id);

        $this->assertModelData($fakeBarangPenyesuaian, $updatedBarangPenyesuaian->toArray());
        $dbBarangPenyesuaian = $this->barangPenyesuaianRepo->find($barangPenyesuaian->id);
        $this->assertModelData($fakeBarangPenyesuaian, $dbBarangPenyesuaian->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();

        $resp = $this->barangPenyesuaianRepo->delete($barangPenyesuaian->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangPenyesuaian::find($barangPenyesuaian->id), 'BarangPenyesuaian should not exist in DB');
    }
}

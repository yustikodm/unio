<?php namespace Tests\Repositories;

use App\Models\BarangPromo;
use App\Repositories\BarangPromoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BarangPromoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BarangPromoRepository
     */
    protected $barangPromoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->barangPromoRepo = \App::make(BarangPromoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->make()->toArray();

        $createdBarangPromo = $this->barangPromoRepo->create($barangPromo);

        $createdBarangPromo = $createdBarangPromo->toArray();
        $this->assertArrayHasKey('id', $createdBarangPromo);
        $this->assertNotNull($createdBarangPromo['id'], 'Created BarangPromo must have id specified');
        $this->assertNotNull(BarangPromo::find($createdBarangPromo['id']), 'BarangPromo with given id must be in DB');
        $this->assertModelData($barangPromo, $createdBarangPromo);
    }

    /**
     * @test read
     */
    public function test_read_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();

        $dbBarangPromo = $this->barangPromoRepo->find($barangPromo->id);

        $dbBarangPromo = $dbBarangPromo->toArray();
        $this->assertModelData($barangPromo->toArray(), $dbBarangPromo);
    }

    /**
     * @test update
     */
    public function test_update_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();
        $fakeBarangPromo = factory(BarangPromo::class)->make()->toArray();

        $updatedBarangPromo = $this->barangPromoRepo->update($fakeBarangPromo, $barangPromo->id);

        $this->assertModelData($fakeBarangPromo, $updatedBarangPromo->toArray());
        $dbBarangPromo = $this->barangPromoRepo->find($barangPromo->id);
        $this->assertModelData($fakeBarangPromo, $dbBarangPromo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();

        $resp = $this->barangPromoRepo->delete($barangPromo->id);

        $this->assertTrue($resp);
        $this->assertNull(BarangPromo::find($barangPromo->id), 'BarangPromo should not exist in DB');
    }
}

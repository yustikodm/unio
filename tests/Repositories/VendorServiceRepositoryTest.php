<?php namespace Tests\Repositories;

use App\Models\VendorService;
use App\Repositories\VendorServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorServiceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorServiceRepository
     */
    protected $vendorServiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vendorServiceRepo = \App::make(VendorServiceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_service()
    {
        $vendorService = factory(VendorService::class)->make()->toArray();

        $createdVendorService = $this->vendorServiceRepo->create($vendorService);

        $createdVendorService = $createdVendorService->toArray();
        $this->assertArrayHasKey('id', $createdVendorService);
        $this->assertNotNull($createdVendorService['id'], 'Created VendorService must have id specified');
        $this->assertNotNull(VendorService::find($createdVendorService['id']), 'VendorService with given id must be in DB');
        $this->assertModelData($vendorService, $createdVendorService);
    }

    /**
     * @test read
     */
    public function test_read_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();

        $dbVendorService = $this->vendorServiceRepo->find($vendorService->id);

        $dbVendorService = $dbVendorService->toArray();
        $this->assertModelData($vendorService->toArray(), $dbVendorService);
    }

    /**
     * @test update
     */
    public function test_update_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();
        $fakeVendorService = factory(VendorService::class)->make()->toArray();

        $updatedVendorService = $this->vendorServiceRepo->update($fakeVendorService, $vendorService->id);

        $this->assertModelData($fakeVendorService, $updatedVendorService->toArray());
        $dbVendorService = $this->vendorServiceRepo->find($vendorService->id);
        $this->assertModelData($fakeVendorService, $dbVendorService->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();

        $resp = $this->vendorServiceRepo->delete($vendorService->id);

        $this->assertTrue($resp);
        $this->assertNull(VendorService::find($vendorService->id), 'VendorService should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\VendorEmployee;
use App\Repositories\VendorEmployeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorEmployeeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorEmployeeRepository
     */
    protected $vendorEmployeeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vendorEmployeeRepo = \App::make(VendorEmployeeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->make()->toArray();

        $createdVendorEmployee = $this->vendorEmployeeRepo->create($vendorEmployee);

        $createdVendorEmployee = $createdVendorEmployee->toArray();
        $this->assertArrayHasKey('id', $createdVendorEmployee);
        $this->assertNotNull($createdVendorEmployee['id'], 'Created VendorEmployee must have id specified');
        $this->assertNotNull(VendorEmployee::find($createdVendorEmployee['id']), 'VendorEmployee with given id must be in DB');
        $this->assertModelData($vendorEmployee, $createdVendorEmployee);
    }

    /**
     * @test read
     */
    public function test_read_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();

        $dbVendorEmployee = $this->vendorEmployeeRepo->find($vendorEmployee->id);

        $dbVendorEmployee = $dbVendorEmployee->toArray();
        $this->assertModelData($vendorEmployee->toArray(), $dbVendorEmployee);
    }

    /**
     * @test update
     */
    public function test_update_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();
        $fakeVendorEmployee = factory(VendorEmployee::class)->make()->toArray();

        $updatedVendorEmployee = $this->vendorEmployeeRepo->update($fakeVendorEmployee, $vendorEmployee->id);

        $this->assertModelData($fakeVendorEmployee, $updatedVendorEmployee->toArray());
        $dbVendorEmployee = $this->vendorEmployeeRepo->find($vendorEmployee->id);
        $this->assertModelData($fakeVendorEmployee, $dbVendorEmployee->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();

        $resp = $this->vendorEmployeeRepo->delete($vendorEmployee->id);

        $this->assertTrue($resp);
        $this->assertNull(VendorEmployee::find($vendorEmployee->id), 'VendorEmployee should not exist in DB');
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VendorEmployee;

class VendorEmployeeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vendor_employees', $vendorEmployee
        );

        $this->assertApiResponse($vendorEmployee);
    }

    /**
     * @test
     */
    public function test_read_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vendor_employees/'.$vendorEmployee->id
        );

        $this->assertApiResponse($vendorEmployee->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();
        $editedVendorEmployee = factory(VendorEmployee::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vendor_employees/'.$vendorEmployee->id,
            $editedVendorEmployee
        );

        $this->assertApiResponse($editedVendorEmployee);
    }

    /**
     * @test
     */
    public function test_delete_vendor_employee()
    {
        $vendorEmployee = factory(VendorEmployee::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vendor_employees/'.$vendorEmployee->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vendor_employees/'.$vendorEmployee->id
        );

        $this->response->assertStatus(404);
    }
}

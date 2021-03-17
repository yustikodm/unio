<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VendorService;

class VendorServiceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_service()
    {
        $vendorService = factory(VendorService::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vendor_services', $vendorService
        );

        $this->assertApiResponse($vendorService);
    }

    /**
     * @test
     */
    public function test_read_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vendor_services/'.$vendorService->id
        );

        $this->assertApiResponse($vendorService->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();
        $editedVendorService = factory(VendorService::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vendor_services/'.$vendorService->id,
            $editedVendorService
        );

        $this->assertApiResponse($editedVendorService);
    }

    /**
     * @test
     */
    public function test_delete_vendor_service()
    {
        $vendorService = factory(VendorService::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vendor_services/'.$vendorService->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vendor_services/'.$vendorService->id
        );

        $this->response->assertStatus(404);
    }
}

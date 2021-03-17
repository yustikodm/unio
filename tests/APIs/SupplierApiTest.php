<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Supplier;

class SupplierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_supplier()
    {
        $supplier = factory(Supplier::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/supplier', $supplier
        );

        $this->assertApiResponse($supplier);
    }

    /**
     * @test
     */
    public function test_read_supplier()
    {
        $supplier = factory(Supplier::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/supplier/'.$supplier->id
        );

        $this->assertApiResponse($supplier->toArray());
    }

    /**
     * @test
     */
    public function test_update_supplier()
    {
        $supplier = factory(Supplier::class)->create();
        $editedSupplier = factory(Supplier::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/supplier/'.$supplier->id,
            $editedSupplier
        );

        $this->assertApiResponse($editedSupplier);
    }

    /**
     * @test
     */
    public function test_delete_supplier()
    {
        $supplier = factory(Supplier::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/supplier/'.$supplier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/supplier/'.$supplier->id
        );

        $this->response->assertStatus(404);
    }
}

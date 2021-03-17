<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DetailPurchaseOrder;

class DetailPurchaseOrderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/detail_purchase_oder', $detailPurchaseOrder
        );

        $this->assertApiResponse($detailPurchaseOrder);
    }

    /**
     * @test
     */
    public function test_read_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/detail_purchase_oder/'.$detailPurchaseOrder->id
        );

        $this->assertApiResponse($detailPurchaseOrder->toArray());
    }

    /**
     * @test
     */
    public function test_update_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();
        $editedDetailPurchaseOrder = factory(DetailPurchaseOrder::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/detail_purchase_oder/'.$detailPurchaseOrder->id,
            $editedDetailPurchaseOrder
        );

        $this->assertApiResponse($editedDetailPurchaseOrder);
    }

    /**
     * @test
     */
    public function test_delete_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/detail_purchase_oder/'.$detailPurchaseOrder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/detail_purchase_oder/'.$detailPurchaseOrder->id
        );

        $this->response->assertStatus(404);
    }
}

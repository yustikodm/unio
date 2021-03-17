<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DetailPenjualan;

class DetailPenjualanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/detail_penjualan', $detailPenjualan
        );

        $this->assertApiResponse($detailPenjualan);
    }

    /**
     * @test
     */
    public function test_read_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/detail_penjualan/'.$detailPenjualan->id
        );

        $this->assertApiResponse($detailPenjualan->toArray());
    }

    /**
     * @test
     */
    public function test_update_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();
        $editedDetailPenjualan = factory(DetailPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/detail_penjualan/'.$detailPenjualan->id,
            $editedDetailPenjualan
        );

        $this->assertApiResponse($editedDetailPenjualan);
    }

    /**
     * @test
     */
    public function test_delete_detail_penjualan()
    {
        $detailPenjualan = factory(DetailPenjualan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/detail_penjualan/'.$detailPenjualan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/detail_penjualan/'.$detailPenjualan->id
        );

        $this->response->assertStatus(404);
    }
}

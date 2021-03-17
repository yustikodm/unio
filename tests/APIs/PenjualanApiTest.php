<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Penjualan;

class PenjualanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_penjualan()
    {
        $penjualan = factory(Penjualan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/penjualan', $penjualan
        );

        $this->assertApiResponse($penjualan);
    }

    /**
     * @test
     */
    public function test_read_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/penjualan/'.$penjualan->id
        );

        $this->assertApiResponse($penjualan->toArray());
    }

    /**
     * @test
     */
    public function test_update_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();
        $editedPenjualan = factory(Penjualan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/penjualan/'.$penjualan->id,
            $editedPenjualan
        );

        $this->assertApiResponse($editedPenjualan);
    }

    /**
     * @test
     */
    public function test_delete_penjualan()
    {
        $penjualan = factory(Penjualan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/penjualan/'.$penjualan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/penjualan/'.$penjualan->id
        );

        $this->response->assertStatus(404);
    }
}

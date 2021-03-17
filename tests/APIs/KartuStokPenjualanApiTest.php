<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KartuStokPenjualan;

class KartuStokPenjualanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kartu_stok_penjualan', $kartuStokPenjualan
        );

        $this->assertApiResponse($kartuStokPenjualan);
    }

    /**
     * @test
     */
    public function test_read_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_penjualan/'.$kartuStokPenjualan->id
        );

        $this->assertApiResponse($kartuStokPenjualan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();
        $editedKartuStokPenjualan = factory(KartuStokPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kartu_stok_penjualan/'.$kartuStokPenjualan->id,
            $editedKartuStokPenjualan
        );

        $this->assertApiResponse($editedKartuStokPenjualan);
    }

    /**
     * @test
     */
    public function test_delete_kartu_stok_penjualan()
    {
        $kartuStokPenjualan = factory(KartuStokPenjualan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kartu_stok_penjualan/'.$kartuStokPenjualan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_penjualan/'.$kartuStokPenjualan->id
        );

        $this->response->assertStatus(404);
    }
}

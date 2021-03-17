<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangPenjualan;

class BarangPenjualanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_penjualan', $barangPenjualan
        );

        $this->assertApiResponse($barangPenjualan);
    }

    /**
     * @test
     */
    public function test_read_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_penjualan/'.$barangPenjualan->id
        );

        $this->assertApiResponse($barangPenjualan->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();
        $editedBarangPenjualan = factory(BarangPenjualan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_penjualan/'.$barangPenjualan->id,
            $editedBarangPenjualan
        );

        $this->assertApiResponse($editedBarangPenjualan);
    }

    /**
     * @test
     */
    public function test_delete_barang_penjualan()
    {
        $barangPenjualan = factory(BarangPenjualan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_penjualan/'.$barangPenjualan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_penjualan/'.$barangPenjualan->id
        );

        $this->response->assertStatus(404);
    }
}

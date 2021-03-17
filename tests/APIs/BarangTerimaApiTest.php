<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangTerima;

class BarangTerimaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_terima', $barangTerima
        );

        $this->assertApiResponse($barangTerima);
    }

    /**
     * @test
     */
    public function test_read_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_terima/'.$barangTerima->id
        );

        $this->assertApiResponse($barangTerima->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();
        $editedBarangTerima = factory(BarangTerima::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_terima/'.$barangTerima->id,
            $editedBarangTerima
        );

        $this->assertApiResponse($editedBarangTerima);
    }

    /**
     * @test
     */
    public function test_delete_barang_terima()
    {
        $barangTerima = factory(BarangTerima::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_terima/'.$barangTerima->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_terima/'.$barangTerima->id
        );

        $this->response->assertStatus(404);
    }
}

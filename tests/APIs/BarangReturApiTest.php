<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangRetur;

class BarangReturApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_retur', $barangRetur
        );

        $this->assertApiResponse($barangRetur);
    }

    /**
     * @test
     */
    public function test_read_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_retur/'.$barangRetur->id
        );

        $this->assertApiResponse($barangRetur->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();
        $editedBarangRetur = factory(BarangRetur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_retur/'.$barangRetur->id,
            $editedBarangRetur
        );

        $this->assertApiResponse($editedBarangRetur);
    }

    /**
     * @test
     */
    public function test_delete_barang_retur()
    {
        $barangRetur = factory(BarangRetur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_retur/'.$barangRetur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_retur/'.$barangRetur->id
        );

        $this->response->assertStatus(404);
    }
}

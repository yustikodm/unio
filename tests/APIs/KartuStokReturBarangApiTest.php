<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KartuStokReturBarang;

class KartuStokReturBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kartu_stok_retur_barang', $kartuStokReturBarang
        );

        $this->assertApiResponse($kartuStokReturBarang);
    }

    /**
     * @test
     */
    public function test_read_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_retur_barang/'.$kartuStokReturBarang->id
        );

        $this->assertApiResponse($kartuStokReturBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();
        $editedKartuStokReturBarang = factory(KartuStokReturBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kartu_stok_retur_barang/'.$kartuStokReturBarang->id,
            $editedKartuStokReturBarang
        );

        $this->assertApiResponse($editedKartuStokReturBarang);
    }

    /**
     * @test
     */
    public function test_delete_kartu_stok_retur_barang()
    {
        $kartuStokReturBarang = factory(KartuStokReturBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kartu_stok_retur_barang/'.$kartuStokReturBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_retur_barang/'.$kartuStokReturBarang->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KartuStokTerimaBarang;

class KartuStokTerimaBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kartu_stok_terima_barang', $kartuStokTerimaBarang
        );

        $this->assertApiResponse($kartuStokTerimaBarang);
    }

    /**
     * @test
     */
    public function test_read_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_terima_barang/'.$kartuStokTerimaBarang->id
        );

        $this->assertApiResponse($kartuStokTerimaBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();
        $editedKartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kartu_stok_terima_barang/'.$kartuStokTerimaBarang->id,
            $editedKartuStokTerimaBarang
        );

        $this->assertApiResponse($editedKartuStokTerimaBarang);
    }

    /**
     * @test
     */
    public function test_delete_kartu_stok_terima_barang()
    {
        $kartuStokTerimaBarang = factory(KartuStokTerimaBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kartu_stok_terima_barang/'.$kartuStokTerimaBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_terima_barang/'.$kartuStokTerimaBarang->id
        );

        $this->response->assertStatus(404);
    }
}

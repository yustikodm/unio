<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TipeBarang;

class TipeBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tipe_barang', $tipeBarang
        );

        $this->assertApiResponse($tipeBarang);
    }

    /**
     * @test
     */
    public function test_read_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tipe_barang/'.$tipeBarang->id
        );

        $this->assertApiResponse($tipeBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();
        $editedTipeBarang = factory(TipeBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tipe_barang/'.$tipeBarang->id,
            $editedTipeBarang
        );

        $this->assertApiResponse($editedTipeBarang);
    }

    /**
     * @test
     */
    public function test_delete_tipe_barang()
    {
        $tipeBarang = factory(TipeBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tipe_barang/'.$tipeBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tipe_barang/'.$tipeBarang->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SatuanBarang;

class SatuanBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/satuan_barang', $satuanBarang
        );

        $this->assertApiResponse($satuanBarang);
    }

    /**
     * @test
     */
    public function test_read_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/satuan_barang/'.$satuanBarang->id
        );

        $this->assertApiResponse($satuanBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();
        $editedSatuanBarang = factory(SatuanBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/satuan_barang/'.$satuanBarang->id,
            $editedSatuanBarang
        );

        $this->assertApiResponse($editedSatuanBarang);
    }

    /**
     * @test
     */
    public function test_delete_satuan_barang()
    {
        $satuanBarang = factory(SatuanBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/satuan_barang/'.$satuanBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/satuan_barang/'.$satuanBarang->id
        );

        $this->response->assertStatus(404);
    }
}

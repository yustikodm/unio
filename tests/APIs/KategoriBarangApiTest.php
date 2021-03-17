<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KategoriBarang;

class KategoriBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kategori_barang', $kategoriBarang
        );

        $this->assertApiResponse($kategoriBarang);
    }

    /**
     * @test
     */
    public function test_read_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kategori_barang/'.$kategoriBarang->id
        );

        $this->assertApiResponse($kategoriBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();
        $editedKategoriBarang = factory(KategoriBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kategori_barang/'.$kategoriBarang->id,
            $editedKategoriBarang
        );

        $this->assertApiResponse($editedKategoriBarang);
    }

    /**
     * @test
     */
    public function test_delete_kategori_barang()
    {
        $kategoriBarang = factory(KategoriBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kategori_barang/'.$kategoriBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kategori_barang/'.$kategoriBarang->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubkategoriBarang;

class SubkategoriBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/subkategori_barang', $subkategoriBarang
        );

        $this->assertApiResponse($subkategoriBarang);
    }

    /**
     * @test
     */
    public function test_read_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/subkategori_barang/'.$subkategoriBarang->id
        );

        $this->assertApiResponse($subkategoriBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();
        $editedSubkategoriBarang = factory(SubkategoriBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/subkategori_barang/'.$subkategoriBarang->id,
            $editedSubkategoriBarang
        );

        $this->assertApiResponse($editedSubkategoriBarang);
    }

    /**
     * @test
     */
    public function test_delete_subkategori_barang()
    {
        $subkategoriBarang = factory(SubkategoriBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/subkategori_barang/'.$subkategoriBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/subkategori_barang/'.$subkategoriBarang->id
        );

        $this->response->assertStatus(404);
    }
}

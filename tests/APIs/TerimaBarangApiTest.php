<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TerimaBarang;

class TerimaBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/terima_barang', $terimaBarang
        );

        $this->assertApiResponse($terimaBarang);
    }

    /**
     * @test
     */
    public function test_read_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/terima_barang/'.$terimaBarang->id
        );

        $this->assertApiResponse($terimaBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();
        $editedTerimaBarang = factory(TerimaBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/terima_barang/'.$terimaBarang->id,
            $editedTerimaBarang
        );

        $this->assertApiResponse($editedTerimaBarang);
    }

    /**
     * @test
     */
    public function test_delete_terima_barang()
    {
        $terimaBarang = factory(TerimaBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/terima_barang/'.$terimaBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/terima_barang/'.$terimaBarang->id
        );

        $this->response->assertStatus(404);
    }
}

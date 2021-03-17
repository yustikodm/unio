<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Barang;

class BarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang()
    {
        $barang = factory(Barang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang', $barang
        );

        $this->assertApiResponse($barang);
    }

    /**
     * @test
     */
    public function test_read_barang()
    {
        $barang = factory(Barang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang/'.$barang->id
        );

        $this->assertApiResponse($barang->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang()
    {
        $barang = factory(Barang::class)->create();
        $editedBarang = factory(Barang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang/'.$barang->id,
            $editedBarang
        );

        $this->assertApiResponse($editedBarang);
    }

    /**
     * @test
     */
    public function test_delete_barang()
    {
        $barang = factory(Barang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang/'.$barang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang/'.$barang->id
        );

        $this->response->assertStatus(404);
    }
}

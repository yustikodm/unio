<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ReturBarang;

class ReturBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/retur_barang', $returBarang
        );

        $this->assertApiResponse($returBarang);
    }

    /**
     * @test
     */
    public function test_read_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/retur_barang/'.$returBarang->id
        );

        $this->assertApiResponse($returBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();
        $editedReturBarang = factory(ReturBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/retur_barang/'.$returBarang->id,
            $editedReturBarang
        );

        $this->assertApiResponse($editedReturBarang);
    }

    /**
     * @test
     */
    public function test_delete_retur_barang()
    {
        $returBarang = factory(ReturBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/retur_barang/'.$returBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/retur_barang/'.$returBarang->id
        );

        $this->response->assertStatus(404);
    }
}

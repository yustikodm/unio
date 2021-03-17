<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Harga;

class HargaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_harga()
    {
        $harga = factory(Harga::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/harga', $harga
        );

        $this->assertApiResponse($harga);
    }

    /**
     * @test
     */
    public function test_read_harga()
    {
        $harga = factory(Harga::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/harga/'.$harga->id
        );

        $this->assertApiResponse($harga->toArray());
    }

    /**
     * @test
     */
    public function test_update_harga()
    {
        $harga = factory(Harga::class)->create();
        $editedHarga = factory(Harga::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/harga/'.$harga->id,
            $editedHarga
        );

        $this->assertApiResponse($editedHarga);
    }

    /**
     * @test
     */
    public function test_delete_harga()
    {
        $harga = factory(Harga::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/harga/'.$harga->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/harga/'.$harga->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pelanggan;

class PelangganApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pelanggan', $pelanggan
        );

        $this->assertApiResponse($pelanggan);
    }

    /**
     * @test
     */
    public function test_read_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pelanggan/'.$pelanggan->id
        );

        $this->assertApiResponse($pelanggan->toArray());
    }

    /**
     * @test
     */
    public function test_update_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();
        $editedPelanggan = factory(Pelanggan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pelanggan/'.$pelanggan->id,
            $editedPelanggan
        );

        $this->assertApiResponse($editedPelanggan);
    }

    /**
     * @test
     */
    public function test_delete_pelanggan()
    {
        $pelanggan = factory(Pelanggan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pelanggan/'.$pelanggan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pelanggan/'.$pelanggan->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MetodePembayaran;

class MetodePembayaranApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/metode_pembayaran', $metodePembayaran
        );

        $this->assertApiResponse($metodePembayaran);
    }

    /**
     * @test
     */
    public function test_read_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/metode_pembayaran/'.$metodePembayaran->id
        );

        $this->assertApiResponse($metodePembayaran->toArray());
    }

    /**
     * @test
     */
    public function test_update_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();
        $editedMetodePembayaran = factory(MetodePembayaran::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/metode_pembayaran/'.$metodePembayaran->id,
            $editedMetodePembayaran
        );

        $this->assertApiResponse($editedMetodePembayaran);
    }

    /**
     * @test
     */
    public function test_delete_metode_pembayaran()
    {
        $metodePembayaran = factory(MetodePembayaran::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/metode_pembayaran/'.$metodePembayaran->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/metode_pembayaran/'.$metodePembayaran->id
        );

        $this->response->assertStatus(404);
    }
}

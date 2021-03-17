<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kota;

class KotaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kota()
    {
        $kota = factory(Kota::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kota', $kota
        );

        $this->assertApiResponse($kota);
    }

    /**
     * @test
     */
    public function test_read_kota()
    {
        $kota = factory(Kota::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kota/'.$kota->id
        );

        $this->assertApiResponse($kota->toArray());
    }

    /**
     * @test
     */
    public function test_update_kota()
    {
        $kota = factory(Kota::class)->create();
        $editedKota = factory(Kota::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kota/'.$kota->id,
            $editedKota
        );

        $this->assertApiResponse($editedKota);
    }

    /**
     * @test
     */
    public function test_delete_kota()
    {
        $kota = factory(Kota::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kota/'.$kota->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kota/'.$kota->id
        );

        $this->response->assertStatus(404);
    }
}

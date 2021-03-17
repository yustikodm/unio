<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pekerjaan;

class PekerjaanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pekerjaan', $pekerjaan
        );

        $this->assertApiResponse($pekerjaan);
    }

    /**
     * @test
     */
    public function test_read_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pekerjaan/'.$pekerjaan->id
        );

        $this->assertApiResponse($pekerjaan->toArray());
    }

    /**
     * @test
     */
    public function test_update_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();
        $editedPekerjaan = factory(Pekerjaan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pekerjaan/'.$pekerjaan->id,
            $editedPekerjaan
        );

        $this->assertApiResponse($editedPekerjaan);
    }

    /**
     * @test
     */
    public function test_delete_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pekerjaan/'.$pekerjaan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pekerjaan/'.$pekerjaan->id
        );

        $this->response->assertStatus(404);
    }
}

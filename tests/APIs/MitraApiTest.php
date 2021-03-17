<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Mitra;

class MitraApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mitra()
    {
        $mitra = factory(Mitra::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/mitra', $mitra
        );

        $this->assertApiResponse($mitra);
    }

    /**
     * @test
     */
    public function test_read_mitra()
    {
        $mitra = factory(Mitra::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/mitra/'.$mitra->id
        );

        $this->assertApiResponse($mitra->toArray());
    }

    /**
     * @test
     */
    public function test_update_mitra()
    {
        $mitra = factory(Mitra::class)->create();
        $editedMitra = factory(Mitra::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/mitra/'.$mitra->id,
            $editedMitra
        );

        $this->assertApiResponse($editedMitra);
    }

    /**
     * @test
     */
    public function test_delete_mitra()
    {
        $mitra = factory(Mitra::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/mitra/'.$mitra->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/mitra/'.$mitra->id
        );

        $this->response->assertStatus(404);
    }
}

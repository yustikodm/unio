<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MutasiKas;

class MutasiKasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/mutasi_kas', $mutasiKas
        );

        $this->assertApiResponse($mutasiKas);
    }

    /**
     * @test
     */
    public function test_read_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/mutasi_kas/'.$mutasiKas->id
        );

        $this->assertApiResponse($mutasiKas->toArray());
    }

    /**
     * @test
     */
    public function test_update_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();
        $editedMutasiKas = factory(MutasiKas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/mutasi_kas/'.$mutasiKas->id,
            $editedMutasiKas
        );

        $this->assertApiResponse($editedMutasiKas);
    }

    /**
     * @test
     */
    public function test_delete_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/mutasi_kas/'.$mutasiKas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/mutasi_kas/'.$mutasiKas->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pegawai;

class PegawaiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pegawai()
    {
        $pegawai = factory(Pegawai::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pegawai', $pegawai
        );

        $this->assertApiResponse($pegawai);
    }

    /**
     * @test
     */
    public function test_read_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pegawai/'.$pegawai->id
        );

        $this->assertApiResponse($pegawai->toArray());
    }

    /**
     * @test
     */
    public function test_update_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();
        $editedPegawai = factory(Pegawai::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pegawai/'.$pegawai->id,
            $editedPegawai
        );

        $this->assertApiResponse($editedPegawai);
    }

    /**
     * @test
     */
    public function test_delete_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pegawai/'.$pegawai->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pegawai/'.$pegawai->id
        );

        $this->response->assertStatus(404);
    }
}

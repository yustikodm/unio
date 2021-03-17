<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Jabatan;

class JabatanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jabatan()
    {
        $jabatan = factory(Jabatan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jabatan', $jabatan
        );

        $this->assertApiResponse($jabatan);
    }

    /**
     * @test
     */
    public function test_read_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/jabatan/'.$jabatan->id
        );

        $this->assertApiResponse($jabatan->toArray());
    }

    /**
     * @test
     */
    public function test_update_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();
        $editedJabatan = factory(Jabatan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jabatan/'.$jabatan->id,
            $editedJabatan
        );

        $this->assertApiResponse($editedJabatan);
    }

    /**
     * @test
     */
    public function test_delete_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jabatan/'.$jabatan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jabatan/'.$jabatan->id
        );

        $this->response->assertStatus(404);
    }
}

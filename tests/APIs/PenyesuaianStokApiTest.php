<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PenyesuaianStok;

class PenyesuaianStokApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/penyesuaian_stok', $penyesuaianStok
        );

        $this->assertApiResponse($penyesuaianStok);
    }

    /**
     * @test
     */
    public function test_read_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/penyesuaian_stok/'.$penyesuaianStok->id
        );

        $this->assertApiResponse($penyesuaianStok->toArray());
    }

    /**
     * @test
     */
    public function test_update_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();
        $editedPenyesuaianStok = factory(PenyesuaianStok::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/penyesuaian_stok/'.$penyesuaianStok->id,
            $editedPenyesuaianStok
        );

        $this->assertApiResponse($editedPenyesuaianStok);
    }

    /**
     * @test
     */
    public function test_delete_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/penyesuaian_stok/'.$penyesuaianStok->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/penyesuaian_stok/'.$penyesuaianStok->id
        );

        $this->response->assertStatus(404);
    }
}

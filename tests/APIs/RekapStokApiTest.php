<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RekapStok;

class RekapStokApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/rekap_stok', $rekapStok
        );

        $this->assertApiResponse($rekapStok);
    }

    /**
     * @test
     */
    public function test_read_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/rekap_stok/'.$rekapStok->id
        );

        $this->assertApiResponse($rekapStok->toArray());
    }

    /**
     * @test
     */
    public function test_update_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();
        $editedRekapStok = factory(RekapStok::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/rekap_stok/'.$rekapStok->id,
            $editedRekapStok
        );

        $this->assertApiResponse($editedRekapStok);
    }

    /**
     * @test
     */
    public function test_delete_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/rekap_stok/'.$rekapStok->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/rekap_stok/'.$rekapStok->id
        );

        $this->response->assertStatus(404);
    }
}

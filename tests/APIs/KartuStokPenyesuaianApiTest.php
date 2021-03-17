<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KartuStokPenyesuaian;

class KartuStokPenyesuaianApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kartu_stok_penyesuaian', $kartuStokPenyesuaian
        );

        $this->assertApiResponse($kartuStokPenyesuaian);
    }

    /**
     * @test
     */
    public function test_read_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_penyesuaian/'.$kartuStokPenyesuaian->id
        );

        $this->assertApiResponse($kartuStokPenyesuaian->toArray());
    }

    /**
     * @test
     */
    public function test_update_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();
        $editedKartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kartu_stok_penyesuaian/'.$kartuStokPenyesuaian->id,
            $editedKartuStokPenyesuaian
        );

        $this->assertApiResponse($editedKartuStokPenyesuaian);
    }

    /**
     * @test
     */
    public function test_delete_kartu_stok_penyesuaian()
    {
        $kartuStokPenyesuaian = factory(KartuStokPenyesuaian::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kartu_stok_penyesuaian/'.$kartuStokPenyesuaian->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kartu_stok_penyesuaian/'.$kartuStokPenyesuaian->id
        );

        $this->response->assertStatus(404);
    }
}

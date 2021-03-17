<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PenerimaanRetur;

class PenerimaanReturApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/penerimaan_retur', $penerimaanRetur
        );

        $this->assertApiResponse($penerimaanRetur);
    }

    /**
     * @test
     */
    public function test_read_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/penerimaan_retur/'.$penerimaanRetur->id
        );

        $this->assertApiResponse($penerimaanRetur->toArray());
    }

    /**
     * @test
     */
    public function test_update_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();
        $editedPenerimaanRetur = factory(PenerimaanRetur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/penerimaan_retur/'.$penerimaanRetur->id,
            $editedPenerimaanRetur
        );

        $this->assertApiResponse($editedPenerimaanRetur);
    }

    /**
     * @test
     */
    public function test_delete_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/penerimaan_retur/'.$penerimaanRetur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/penerimaan_retur/'.$penerimaanRetur->id
        );

        $this->response->assertStatus(404);
    }
}

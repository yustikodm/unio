<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangPenerimaan;

class BarangPenerimaanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_penerimaan', $barangPenerimaan
        );

        $this->assertApiResponse($barangPenerimaan);
    }

    /**
     * @test
     */
    public function test_read_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_penerimaan/'.$barangPenerimaan->id
        );

        $this->assertApiResponse($barangPenerimaan->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();
        $editedBarangPenerimaan = factory(BarangPenerimaan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_penerimaan/'.$barangPenerimaan->id,
            $editedBarangPenerimaan
        );

        $this->assertApiResponse($editedBarangPenerimaan);
    }

    /**
     * @test
     */
    public function test_delete_barang_penerimaan()
    {
        $barangPenerimaan = factory(BarangPenerimaan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_penerimaan/'.$barangPenerimaan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_penerimaan/'.$barangPenerimaan->id
        );

        $this->response->assertStatus(404);
    }
}

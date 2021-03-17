<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangPenyesuaian;

class BarangPenyesuaianApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_penyesuaian', $barangPenyesuaian
        );

        $this->assertApiResponse($barangPenyesuaian);
    }

    /**
     * @test
     */
    public function test_read_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_penyesuaian/'.$barangPenyesuaian->id
        );

        $this->assertApiResponse($barangPenyesuaian->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();
        $editedBarangPenyesuaian = factory(BarangPenyesuaian::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_penyesuaian/'.$barangPenyesuaian->id,
            $editedBarangPenyesuaian
        );

        $this->assertApiResponse($editedBarangPenyesuaian);
    }

    /**
     * @test
     */
    public function test_delete_barang_penyesuaian()
    {
        $barangPenyesuaian = factory(BarangPenyesuaian::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_penyesuaian/'.$barangPenyesuaian->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_penyesuaian/'.$barangPenyesuaian->id
        );

        $this->response->assertStatus(404);
    }
}

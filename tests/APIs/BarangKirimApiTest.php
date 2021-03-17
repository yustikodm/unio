<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangKirim;

class BarangKirimApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barang_kirim', $barangKirim
        );

        $this->assertApiResponse($barangKirim);
    }

    /**
     * @test
     */
    public function test_read_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barang_kirim/'.$barangKirim->id
        );

        $this->assertApiResponse($barangKirim->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();
        $editedBarangKirim = factory(BarangKirim::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barang_kirim/'.$barangKirim->id,
            $editedBarangKirim
        );

        $this->assertApiResponse($editedBarangKirim);
    }

    /**
     * @test
     */
    public function test_delete_barang_kirim()
    {
        $barangKirim = factory(BarangKirim::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barang_kirim/'.$barangKirim->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barang_kirim/'.$barangKirim->id
        );

        $this->response->assertStatus(404);
    }
}

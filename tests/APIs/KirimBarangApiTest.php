<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KirimBarang;

class KirimBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kirim_barang', $kirimBarang
        );

        $this->assertApiResponse($kirimBarang);
    }

    /**
     * @test
     */
    public function test_read_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kirim_barang/'.$kirimBarang->id
        );

        $this->assertApiResponse($kirimBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();
        $editedKirimBarang = factory(KirimBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kirim_barang/'.$kirimBarang->id,
            $editedKirimBarang
        );

        $this->assertApiResponse($editedKirimBarang);
    }

    /**
     * @test
     */
    public function test_delete_kirim_barang()
    {
        $kirimBarang = factory(KirimBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kirim_barang/'.$kirimBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kirim_barang/'.$kirimBarang->id
        );

        $this->response->assertStatus(404);
    }
}

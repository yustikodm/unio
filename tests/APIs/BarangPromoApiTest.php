<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BarangPromo;

class BarangPromoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barangpromo', $barangPromo
        );

        $this->assertApiResponse($barangPromo);
    }

    /**
     * @test
     */
    public function test_read_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/barangpromo/'.$barangPromo->id
        );

        $this->assertApiResponse($barangPromo->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();
        $editedBarangPromo = factory(BarangPromo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barangpromo/'.$barangPromo->id,
            $editedBarangPromo
        );

        $this->assertApiResponse($editedBarangPromo);
    }

    /**
     * @test
     */
    public function test_delete_barang_promo()
    {
        $barangPromo = factory(BarangPromo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barangpromo/'.$barangPromo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barangpromo/'.$barangPromo->id
        );

        $this->response->assertStatus(404);
    }
}

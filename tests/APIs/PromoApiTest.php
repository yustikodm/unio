<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Promo;

class PromoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_promo()
    {
        $promo = factory(Promo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/promo', $promo
        );

        $this->assertApiResponse($promo);
    }

    /**
     * @test
     */
    public function test_read_promo()
    {
        $promo = factory(Promo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/promo/'.$promo->id
        );

        $this->assertApiResponse($promo->toArray());
    }

    /**
     * @test
     */
    public function test_update_promo()
    {
        $promo = factory(Promo::class)->create();
        $editedPromo = factory(Promo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/promo/'.$promo->id,
            $editedPromo
        );

        $this->assertApiResponse($editedPromo);
    }

    /**
     * @test
     */
    public function test_delete_promo()
    {
        $promo = factory(Promo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/promo/'.$promo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/promo/'.$promo->id
        );

        $this->response->assertStatus(404);
    }
}

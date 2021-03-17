<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Poin;

class PoinApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_poin()
    {
        $poin = factory(Poin::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/poin', $poin
        );

        $this->assertApiResponse($poin);
    }

    /**
     * @test
     */
    public function test_read_poin()
    {
        $poin = factory(Poin::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/poin/'.$poin->id
        );

        $this->assertApiResponse($poin->toArray());
    }

    /**
     * @test
     */
    public function test_update_poin()
    {
        $poin = factory(Poin::class)->create();
        $editedPoin = factory(Poin::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/poin/'.$poin->id,
            $editedPoin
        );

        $this->assertApiResponse($editedPoin);
    }

    /**
     * @test
     */
    public function test_delete_poin()
    {
        $poin = factory(Poin::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/poin/'.$poin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/poin/'.$poin->id
        );

        $this->response->assertStatus(404);
    }
}

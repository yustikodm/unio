<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Stok;

class StokApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stok()
    {
        $stok = factory(Stok::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stok', $stok
        );

        $this->assertApiResponse($stok);
    }

    /**
     * @test
     */
    public function test_read_stok()
    {
        $stok = factory(Stok::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stok/'.$stok->id
        );

        $this->assertApiResponse($stok->toArray());
    }

    /**
     * @test
     */
    public function test_update_stok()
    {
        $stok = factory(Stok::class)->create();
        $editedStok = factory(Stok::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stok/'.$stok->id,
            $editedStok
        );

        $this->assertApiResponse($editedStok);
    }

    /**
     * @test
     */
    public function test_delete_stok()
    {
        $stok = factory(Stok::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stok/'.$stok->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stok/'.$stok->id
        );

        $this->response->assertStatus(404);
    }
}

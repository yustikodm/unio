<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bintang;

class BintangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bintang()
    {
        $bintang = factory(Bintang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bintang', $bintang
        );

        $this->assertApiResponse($bintang);
    }

    /**
     * @test
     */
    public function test_read_bintang()
    {
        $bintang = factory(Bintang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bintang/'.$bintang->id
        );

        $this->assertApiResponse($bintang->toArray());
    }

    /**
     * @test
     */
    public function test_update_bintang()
    {
        $bintang = factory(Bintang::class)->create();
        $editedBintang = factory(Bintang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bintang/'.$bintang->id,
            $editedBintang
        );

        $this->assertApiResponse($editedBintang);
    }

    /**
     * @test
     */
    public function test_delete_bintang()
    {
        $bintang = factory(Bintang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bintang/'.$bintang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bintang/'.$bintang->id
        );

        $this->response->assertStatus(404);
    }
}

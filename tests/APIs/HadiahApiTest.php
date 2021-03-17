<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Hadiah;

class HadiahApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hadiah()
    {
        $hadiah = factory(Hadiah::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/hadiah', $hadiah
        );

        $this->assertApiResponse($hadiah);
    }

    /**
     * @test
     */
    public function test_read_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/hadiah/'.$hadiah->id
        );

        $this->assertApiResponse($hadiah->toArray());
    }

    /**
     * @test
     */
    public function test_update_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();
        $editedHadiah = factory(Hadiah::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/hadiah/'.$hadiah->id,
            $editedHadiah
        );

        $this->assertApiResponse($editedHadiah);
    }

    /**
     * @test
     */
    public function test_delete_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/hadiah/'.$hadiah->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/hadiah/'.$hadiah->id
        );

        $this->response->assertStatus(404);
    }
}

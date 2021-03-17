<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Diskon;

class DiskonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_diskon()
    {
        $diskon = factory(Diskon::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/diskon', $diskon
        );

        $this->assertApiResponse($diskon);
    }

    /**
     * @test
     */
    public function test_read_diskon()
    {
        $diskon = factory(Diskon::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/diskon/'.$diskon->id
        );

        $this->assertApiResponse($diskon->toArray());
    }

    /**
     * @test
     */
    public function test_update_diskon()
    {
        $diskon = factory(Diskon::class)->create();
        $editedDiskon = factory(Diskon::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/diskon/'.$diskon->id,
            $editedDiskon
        );

        $this->assertApiResponse($editedDiskon);
    }

    /**
     * @test
     */
    public function test_delete_diskon()
    {
        $diskon = factory(Diskon::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/diskon/'.$diskon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/diskon/'.$diskon->id
        );

        $this->response->assertStatus(404);
    }
}

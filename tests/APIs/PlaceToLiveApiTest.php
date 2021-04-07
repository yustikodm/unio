<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PlaceToLive;

class PlaceToLiveApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/place_to_lives', $placeToLive
        );

        $this->assertApiResponse($placeToLive);
    }

    /**
     * @test
     */
    public function test_read_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/place_to_lives/'.$placeToLive->id
        );

        $this->assertApiResponse($placeToLive->toArray());
    }

    /**
     * @test
     */
    public function test_update_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();
        $editedPlaceToLive = factory(PlaceToLive::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/place_to_lives/'.$placeToLive->id,
            $editedPlaceToLive
        );

        $this->assertApiResponse($editedPlaceToLive);
    }

    /**
     * @test
     */
    public function test_delete_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/place_to_lives/'.$placeToLive->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/place_to_lives/'.$placeToLive->id
        );

        $this->response->assertStatus(404);
    }
}

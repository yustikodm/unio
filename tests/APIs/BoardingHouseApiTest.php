<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BoardingHouse;

class BoardingHouseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/boarding_houses', $boardingHouse
        );

        $this->assertApiResponse($boardingHouse);
    }

    /**
     * @test
     */
    public function test_read_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/boarding_houses/'.$boardingHouse->id
        );

        $this->assertApiResponse($boardingHouse->toArray());
    }

    /**
     * @test
     */
    public function test_update_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();
        $editedBoardingHouse = factory(BoardingHouse::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/boarding_houses/'.$boardingHouse->id,
            $editedBoardingHouse
        );

        $this->assertApiResponse($editedBoardingHouse);
    }

    /**
     * @test
     */
    public function test_delete_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/boarding_houses/'.$boardingHouse->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/boarding_houses/'.$boardingHouse->id
        );

        $this->response->assertStatus(404);
    }
}

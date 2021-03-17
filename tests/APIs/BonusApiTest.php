<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bonus;

class BonusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bonus()
    {
        $bonus = factory(Bonus::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bonus', $bonus
        );

        $this->assertApiResponse($bonus);
    }

    /**
     * @test
     */
    public function test_read_bonus()
    {
        $bonus = factory(Bonus::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bonus/'.$bonus->id
        );

        $this->assertApiResponse($bonus->toArray());
    }

    /**
     * @test
     */
    public function test_update_bonus()
    {
        $bonus = factory(Bonus::class)->create();
        $editedBonus = factory(Bonus::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bonus/'.$bonus->id,
            $editedBonus
        );

        $this->assertApiResponse($editedBonus);
    }

    /**
     * @test
     */
    public function test_delete_bonus()
    {
        $bonus = factory(Bonus::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bonus/'.$bonus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bonus/'.$bonus->id
        );

        $this->response->assertStatus(404);
    }
}

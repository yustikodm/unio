<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LogBonus;

class LogBonusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/log_bonus', $logBonus
        );

        $this->assertApiResponse($logBonus);
    }

    /**
     * @test
     */
    public function test_read_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/log_bonus/'.$logBonus->id
        );

        $this->assertApiResponse($logBonus->toArray());
    }

    /**
     * @test
     */
    public function test_update_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();
        $editedLogBonus = factory(LogBonus::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/log_bonus/'.$logBonus->id,
            $editedLogBonus
        );

        $this->assertApiResponse($editedLogBonus);
    }

    /**
     * @test
     */
    public function test_delete_log_bonus()
    {
        $logBonus = factory(LogBonus::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/log_bonus/'.$logBonus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/log_bonus/'.$logBonus->id
        );

        $this->response->assertStatus(404);
    }
}

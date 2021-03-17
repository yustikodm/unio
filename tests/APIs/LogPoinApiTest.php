<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LogPoin;

class LogPoinApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_log_poin()
    {
        $logPoin = factory(LogPoin::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/log_poin', $logPoin
        );

        $this->assertApiResponse($logPoin);
    }

    /**
     * @test
     */
    public function test_read_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/log_poin/'.$logPoin->id
        );

        $this->assertApiResponse($logPoin->toArray());
    }

    /**
     * @test
     */
    public function test_update_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();
        $editedLogPoin = factory(LogPoin::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/log_poin/'.$logPoin->id,
            $editedLogPoin
        );

        $this->assertApiResponse($editedLogPoin);
    }

    /**
     * @test
     */
    public function test_delete_log_poin()
    {
        $logPoin = factory(LogPoin::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/log_poin/'.$logPoin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/log_poin/'.$logPoin->id
        );

        $this->response->assertStatus(404);
    }
}

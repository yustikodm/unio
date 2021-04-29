<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TopupHistory;

class TopupHistoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/topup_histories', $topupHistory
        );

        $this->assertApiResponse($topupHistory);
    }

    /**
     * @test
     */
    public function test_read_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/topup_histories/'.$topupHistory->id
        );

        $this->assertApiResponse($topupHistory->toArray());
    }

    /**
     * @test
     */
    public function test_update_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();
        $editedTopupHistory = factory(TopupHistory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/topup_histories/'.$topupHistory->id,
            $editedTopupHistory
        );

        $this->assertApiResponse($editedTopupHistory);
    }

    /**
     * @test
     */
    public function test_delete_topup_history()
    {
        $topupHistory = factory(TopupHistory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/topup_histories/'.$topupHistory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/topup_histories/'.$topupHistory->id
        );

        $this->response->assertStatus(404);
    }
}

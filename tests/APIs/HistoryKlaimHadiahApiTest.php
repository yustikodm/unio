<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\HistoryKlaimHadiah;

class HistoryKlaimHadiahApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/history_klaim_hadiah', $historyKlaimHadiah
        );

        $this->assertApiResponse($historyKlaimHadiah);
    }

    /**
     * @test
     */
    public function test_read_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/history_klaim_hadiah/'.$historyKlaimHadiah->id
        );

        $this->assertApiResponse($historyKlaimHadiah->toArray());
    }

    /**
     * @test
     */
    public function test_update_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();
        $editedHistoryKlaimHadiah = factory(HistoryKlaimHadiah::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/history_klaim_hadiah/'.$historyKlaimHadiah->id,
            $editedHistoryKlaimHadiah
        );

        $this->assertApiResponse($editedHistoryKlaimHadiah);
    }

    /**
     * @test
     */
    public function test_delete_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/history_klaim_hadiah/'.$historyKlaimHadiah->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/history_klaim_hadiah/'.$historyKlaimHadiah->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LogKlaimBonus;

class LogKlaimBonusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/log_klaim_bonus', $logKlaimBonus
        );

        $this->assertApiResponse($logKlaimBonus);
    }

    /**
     * @test
     */
    public function test_read_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/log_klaim_bonus/'.$logKlaimBonus->id
        );

        $this->assertApiResponse($logKlaimBonus->toArray());
    }

    /**
     * @test
     */
    public function test_update_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();
        $editedLogKlaimBonus = factory(LogKlaimBonus::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/log_klaim_bonus/'.$logKlaimBonus->id,
            $editedLogKlaimBonus
        );

        $this->assertApiResponse($editedLogKlaimBonus);
    }

    /**
     * @test
     */
    public function test_delete_log_klaim_bonus()
    {
        $logKlaimBonus = factory(LogKlaimBonus::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/log_klaim_bonus/'.$logKlaimBonus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/log_klaim_bonus/'.$logKlaimBonus->id
        );

        $this->response->assertStatus(404);
    }
}

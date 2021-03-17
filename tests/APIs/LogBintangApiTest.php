<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LogBintang;

class LogBintangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/log_bintang', $logBintang
        );

        $this->assertApiResponse($logBintang);
    }

    /**
     * @test
     */
    public function test_read_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/log_bintang/'.$logBintang->id
        );

        $this->assertApiResponse($logBintang->toArray());
    }

    /**
     * @test
     */
    public function test_update_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();
        $editedLogBintang = factory(LogBintang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/log_bintang/'.$logBintang->id,
            $editedLogBintang
        );

        $this->assertApiResponse($editedLogBintang);
    }

    /**
     * @test
     */
    public function test_delete_log_bintang()
    {
        $logBintang = factory(LogBintang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/log_bintang/'.$logBintang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/log_bintang/'.$logBintang->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bank;

class BankApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bank()
    {
        $bank = factory(Bank::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bank', $bank
        );

        $this->assertApiResponse($bank);
    }

    /**
     * @test
     */
    public function test_read_bank()
    {
        $bank = factory(Bank::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bank/'.$bank->id
        );

        $this->assertApiResponse($bank->toArray());
    }

    /**
     * @test
     */
    public function test_update_bank()
    {
        $bank = factory(Bank::class)->create();
        $editedBank = factory(Bank::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bank/'.$bank->id,
            $editedBank
        );

        $this->assertApiResponse($editedBank);
    }

    /**
     * @test
     */
    public function test_delete_bank()
    {
        $bank = factory(Bank::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bank/'.$bank->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bank/'.$bank->id
        );

        $this->response->assertStatus(404);
    }
}

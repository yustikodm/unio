<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FOS;

class FOSApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_f_o_s()
    {
        $fOS = factory(FOS::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/f_o_s', $fOS
        );

        $this->assertApiResponse($fOS);
    }

    /**
     * @test
     */
    public function test_read_f_o_s()
    {
        $fOS = factory(FOS::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/f_o_s/'.$fOS->id
        );

        $this->assertApiResponse($fOS->toArray());
    }

    /**
     * @test
     */
    public function test_update_f_o_s()
    {
        $fOS = factory(FOS::class)->create();
        $editedFOS = factory(FOS::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/f_o_s/'.$fOS->id,
            $editedFOS
        );

        $this->assertApiResponse($editedFOS);
    }

    /**
     * @test
     */
    public function test_delete_f_o_s()
    {
        $fOS = factory(FOS::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/f_o_s/'.$fOS->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/f_o_s/'.$fOS->id
        );

        $this->response->assertStatus(404);
    }
}

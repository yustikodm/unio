<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TipeParameter;

class TipeParameterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tipe_parameter', $tipeParameter
        );

        $this->assertApiResponse($tipeParameter);
    }

    /**
     * @test
     */
    public function test_read_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tipe_parameter/'.$tipeParameter->id
        );

        $this->assertApiResponse($tipeParameter->toArray());
    }

    /**
     * @test
     */
    public function test_update_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();
        $editedTipeParameter = factory(TipeParameter::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tipe_parameter/'.$tipeParameter->id,
            $editedTipeParameter
        );

        $this->assertApiResponse($editedTipeParameter);
    }

    /**
     * @test
     */
    public function test_delete_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tipe_parameter/'.$tipeParameter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tipe_parameter/'.$tipeParameter->id
        );

        $this->response->assertStatus(404);
    }
}

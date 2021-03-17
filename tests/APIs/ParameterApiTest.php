<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Parameter;

class ParameterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parameter()
    {
        $parameter = factory(Parameter::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parameter', $parameter
        );

        $this->assertApiResponse($parameter);
    }

    /**
     * @test
     */
    public function test_read_parameter()
    {
        $parameter = factory(Parameter::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parameter/'.$parameter->id
        );

        $this->assertApiResponse($parameter->toArray());
    }

    /**
     * @test
     */
    public function test_update_parameter()
    {
        $parameter = factory(Parameter::class)->create();
        $editedParameter = factory(Parameter::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parameter/'.$parameter->id,
            $editedParameter
        );

        $this->assertApiResponse($editedParameter);
    }

    /**
     * @test
     */
    public function test_delete_parameter()
    {
        $parameter = factory(Parameter::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parameter/'.$parameter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parameter/'.$parameter->id
        );

        $this->response->assertStatus(404);
    }
}

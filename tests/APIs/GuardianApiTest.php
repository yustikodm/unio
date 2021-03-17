<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Guardian;

class GuardianApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_guardian()
    {
        $guardian = factory(Guardian::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/guardians', $guardian
        );

        $this->assertApiResponse($guardian);
    }

    /**
     * @test
     */
    public function test_read_guardian()
    {
        $guardian = factory(Guardian::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/guardians/'.$guardian->id
        );

        $this->assertApiResponse($guardian->toArray());
    }

    /**
     * @test
     */
    public function test_update_guardian()
    {
        $guardian = factory(Guardian::class)->create();
        $editedGuardian = factory(Guardian::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/guardians/'.$guardian->id,
            $editedGuardian
        );

        $this->assertApiResponse($editedGuardian);
    }

    /**
     * @test
     */
    public function test_delete_guardian()
    {
        $guardian = factory(Guardian::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/guardians/'.$guardian->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/guardians/'.$guardian->id
        );

        $this->response->assertStatus(404);
    }
}

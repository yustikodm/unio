<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Biodata;

class BiodataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_biodata()
    {
        $biodata = factory(Biodata::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/biodatas', $biodata
        );

        $this->assertApiResponse($biodata);
    }

    /**
     * @test
     */
    public function test_read_biodata()
    {
        $biodata = factory(Biodata::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/biodatas/'.$biodata->id
        );

        $this->assertApiResponse($biodata->toArray());
    }

    /**
     * @test
     */
    public function test_update_biodata()
    {
        $biodata = factory(Biodata::class)->create();
        $editedBiodata = factory(Biodata::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/biodatas/'.$biodata->id,
            $editedBiodata
        );

        $this->assertApiResponse($editedBiodata);
    }

    /**
     * @test
     */
    public function test_delete_biodata()
    {
        $biodata = factory(Biodata::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/biodatas/'.$biodata->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/biodatas/'.$biodata->id
        );

        $this->response->assertStatus(404);
    }
}

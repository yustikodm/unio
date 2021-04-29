<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TopupPackage;

class TopupPackageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_topup_package()
    {
        $topupPackage = factory(TopupPackage::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/topup_packages', $topupPackage
        );

        $this->assertApiResponse($topupPackage);
    }

    /**
     * @test
     */
    public function test_read_topup_package()
    {
        $topupPackage = factory(TopupPackage::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/topup_packages/'.$topupPackage->id
        );

        $this->assertApiResponse($topupPackage->toArray());
    }

    /**
     * @test
     */
    public function test_update_topup_package()
    {
        $topupPackage = factory(TopupPackage::class)->create();
        $editedTopupPackage = factory(TopupPackage::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/topup_packages/'.$topupPackage->id,
            $editedTopupPackage
        );

        $this->assertApiResponse($editedTopupPackage);
    }

    /**
     * @test
     */
    public function test_delete_topup_package()
    {
        $topupPackage = factory(TopupPackage::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/topup_packages/'.$topupPackage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/topup_packages/'.$topupPackage->id
        );

        $this->response->assertStatus(404);
    }
}

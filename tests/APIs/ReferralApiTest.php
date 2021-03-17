<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Referral;

class ReferralApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_referral()
    {
        $referral = factory(Referral::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/referral', $referral
        );

        $this->assertApiResponse($referral);
    }

    /**
     * @test
     */
    public function test_read_referral()
    {
        $referral = factory(Referral::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/referral/'.$referral->id
        );

        $this->assertApiResponse($referral->toArray());
    }

    /**
     * @test
     */
    public function test_update_referral()
    {
        $referral = factory(Referral::class)->create();
        $editedReferral = factory(Referral::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/referral/'.$referral->id,
            $editedReferral
        );

        $this->assertApiResponse($editedReferral);
    }

    /**
     * @test
     */
    public function test_delete_referral()
    {
        $referral = factory(Referral::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/referral/'.$referral->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/referral/'.$referral->id
        );

        $this->response->assertStatus(404);
    }
}

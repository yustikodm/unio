<?php namespace Tests\Repositories;

use App\Models\Referral;
use App\Repositories\ReferralRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ReferralRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReferralRepository
     */
    protected $referralRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->referralRepo = \App::make(ReferralRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_referral()
    {
        $referral = factory(Referral::class)->make()->toArray();

        $createdReferral = $this->referralRepo->create($referral);

        $createdReferral = $createdReferral->toArray();
        $this->assertArrayHasKey('id', $createdReferral);
        $this->assertNotNull($createdReferral['id'], 'Created Referral must have id specified');
        $this->assertNotNull(Referral::find($createdReferral['id']), 'Referral with given id must be in DB');
        $this->assertModelData($referral, $createdReferral);
    }

    /**
     * @test read
     */
    public function test_read_referral()
    {
        $referral = factory(Referral::class)->create();

        $dbReferral = $this->referralRepo->find($referral->id);

        $dbReferral = $dbReferral->toArray();
        $this->assertModelData($referral->toArray(), $dbReferral);
    }

    /**
     * @test update
     */
    public function test_update_referral()
    {
        $referral = factory(Referral::class)->create();
        $fakeReferral = factory(Referral::class)->make()->toArray();

        $updatedReferral = $this->referralRepo->update($fakeReferral, $referral->id);

        $this->assertModelData($fakeReferral, $updatedReferral->toArray());
        $dbReferral = $this->referralRepo->find($referral->id);
        $this->assertModelData($fakeReferral, $dbReferral->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_referral()
    {
        $referral = factory(Referral::class)->create();

        $resp = $this->referralRepo->delete($referral->id);

        $this->assertTrue($resp);
        $this->assertNull(Referral::find($referral->id), 'Referral should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\UniversityFee;
use App\Repositories\UniversityFeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityFeeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityFeeRepository
     */
    protected $universityFeeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityFeeRepo = \App::make(UniversityFeeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->make()->toArray();

        $createdUniversityFee = $this->universityFeeRepo->create($universityFee);

        $createdUniversityFee = $createdUniversityFee->toArray();
        $this->assertArrayHasKey('id', $createdUniversityFee);
        $this->assertNotNull($createdUniversityFee['id'], 'Created UniversityFee must have id specified');
        $this->assertNotNull(UniversityFee::find($createdUniversityFee['id']), 'UniversityFee with given id must be in DB');
        $this->assertModelData($universityFee, $createdUniversityFee);
    }

    /**
     * @test read
     */
    public function test_read_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();

        $dbUniversityFee = $this->universityFeeRepo->find($universityFee->id);

        $dbUniversityFee = $dbUniversityFee->toArray();
        $this->assertModelData($universityFee->toArray(), $dbUniversityFee);
    }

    /**
     * @test update
     */
    public function test_update_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();
        $fakeUniversityFee = factory(UniversityFee::class)->make()->toArray();

        $updatedUniversityFee = $this->universityFeeRepo->update($fakeUniversityFee, $universityFee->id);

        $this->assertModelData($fakeUniversityFee, $updatedUniversityFee->toArray());
        $dbUniversityFee = $this->universityFeeRepo->find($universityFee->id);
        $this->assertModelData($fakeUniversityFee, $dbUniversityFee->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university_fee()
    {
        $universityFee = factory(UniversityFee::class)->create();

        $resp = $this->universityFeeRepo->delete($universityFee->id);

        $this->assertTrue($resp);
        $this->assertNull(UniversityFee::find($universityFee->id), 'UniversityFee should not exist in DB');
    }
}

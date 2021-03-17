<?php namespace Tests\Repositories;

use App\Models\UniversityRequirement;
use App\Repositories\UniversityRequirementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityRequirementRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityRequirementRepository
     */
    protected $universityRequirementRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityRequirementRepo = \App::make(UniversityRequirementRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->make()->toArray();

        $createdUniversityRequirement = $this->universityRequirementRepo->create($universityRequirement);

        $createdUniversityRequirement = $createdUniversityRequirement->toArray();
        $this->assertArrayHasKey('id', $createdUniversityRequirement);
        $this->assertNotNull($createdUniversityRequirement['id'], 'Created UniversityRequirement must have id specified');
        $this->assertNotNull(UniversityRequirement::find($createdUniversityRequirement['id']), 'UniversityRequirement with given id must be in DB');
        $this->assertModelData($universityRequirement, $createdUniversityRequirement);
    }

    /**
     * @test read
     */
    public function test_read_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();

        $dbUniversityRequirement = $this->universityRequirementRepo->find($universityRequirement->id);

        $dbUniversityRequirement = $dbUniversityRequirement->toArray();
        $this->assertModelData($universityRequirement->toArray(), $dbUniversityRequirement);
    }

    /**
     * @test update
     */
    public function test_update_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();
        $fakeUniversityRequirement = factory(UniversityRequirement::class)->make()->toArray();

        $updatedUniversityRequirement = $this->universityRequirementRepo->update($fakeUniversityRequirement, $universityRequirement->id);

        $this->assertModelData($fakeUniversityRequirement, $updatedUniversityRequirement->toArray());
        $dbUniversityRequirement = $this->universityRequirementRepo->find($universityRequirement->id);
        $this->assertModelData($fakeUniversityRequirement, $dbUniversityRequirement->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university_requirement()
    {
        $universityRequirement = factory(UniversityRequirement::class)->create();

        $resp = $this->universityRequirementRepo->delete($universityRequirement->id);

        $this->assertTrue($resp);
        $this->assertNull(UniversityRequirement::find($universityRequirement->id), 'UniversityRequirement should not exist in DB');
    }
}

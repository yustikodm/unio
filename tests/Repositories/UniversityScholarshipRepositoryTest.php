<?php namespace Tests\Repositories;

use App\Models\UniversityScholarship;
use App\Repositories\UniversityScholarshipRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityScholarshipRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityScholarshipRepository
     */
    protected $universityScholarshipRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityScholarshipRepo = \App::make(UniversityScholarshipRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->make()->toArray();

        $createdUniversityScholarship = $this->universityScholarshipRepo->create($universityScholarship);

        $createdUniversityScholarship = $createdUniversityScholarship->toArray();
        $this->assertArrayHasKey('id', $createdUniversityScholarship);
        $this->assertNotNull($createdUniversityScholarship['id'], 'Created UniversityScholarship must have id specified');
        $this->assertNotNull(UniversityScholarship::find($createdUniversityScholarship['id']), 'UniversityScholarship with given id must be in DB');
        $this->assertModelData($universityScholarship, $createdUniversityScholarship);
    }

    /**
     * @test read
     */
    public function test_read_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();

        $dbUniversityScholarship = $this->universityScholarshipRepo->find($universityScholarship->id);

        $dbUniversityScholarship = $dbUniversityScholarship->toArray();
        $this->assertModelData($universityScholarship->toArray(), $dbUniversityScholarship);
    }

    /**
     * @test update
     */
    public function test_update_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();
        $fakeUniversityScholarship = factory(UniversityScholarship::class)->make()->toArray();

        $updatedUniversityScholarship = $this->universityScholarshipRepo->update($fakeUniversityScholarship, $universityScholarship->id);

        $this->assertModelData($fakeUniversityScholarship, $updatedUniversityScholarship->toArray());
        $dbUniversityScholarship = $this->universityScholarshipRepo->find($universityScholarship->id);
        $this->assertModelData($fakeUniversityScholarship, $dbUniversityScholarship->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university_scholarship()
    {
        $universityScholarship = factory(UniversityScholarship::class)->create();

        $resp = $this->universityScholarshipRepo->delete($universityScholarship->id);

        $this->assertTrue($resp);
        $this->assertNull(UniversityScholarship::find($universityScholarship->id), 'UniversityScholarship should not exist in DB');
    }
}

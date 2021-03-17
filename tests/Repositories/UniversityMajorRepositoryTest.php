<?php namespace Tests\Repositories;

use App\Models\UniversityMajor;
use App\Repositories\UniversityMajorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityMajorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityMajorRepository
     */
    protected $universityMajorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityMajorRepo = \App::make(UniversityMajorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->make()->toArray();

        $createdUniversityMajor = $this->universityMajorRepo->create($universityMajor);

        $createdUniversityMajor = $createdUniversityMajor->toArray();
        $this->assertArrayHasKey('id', $createdUniversityMajor);
        $this->assertNotNull($createdUniversityMajor['id'], 'Created UniversityMajor must have id specified');
        $this->assertNotNull(UniversityMajor::find($createdUniversityMajor['id']), 'UniversityMajor with given id must be in DB');
        $this->assertModelData($universityMajor, $createdUniversityMajor);
    }

    /**
     * @test read
     */
    public function test_read_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();

        $dbUniversityMajor = $this->universityMajorRepo->find($universityMajor->id);

        $dbUniversityMajor = $dbUniversityMajor->toArray();
        $this->assertModelData($universityMajor->toArray(), $dbUniversityMajor);
    }

    /**
     * @test update
     */
    public function test_update_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();
        $fakeUniversityMajor = factory(UniversityMajor::class)->make()->toArray();

        $updatedUniversityMajor = $this->universityMajorRepo->update($fakeUniversityMajor, $universityMajor->id);

        $this->assertModelData($fakeUniversityMajor, $updatedUniversityMajor->toArray());
        $dbUniversityMajor = $this->universityMajorRepo->find($universityMajor->id);
        $this->assertModelData($fakeUniversityMajor, $dbUniversityMajor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university_major()
    {
        $universityMajor = factory(UniversityMajor::class)->create();

        $resp = $this->universityMajorRepo->delete($universityMajor->id);

        $this->assertTrue($resp);
        $this->assertNull(UniversityMajor::find($universityMajor->id), 'UniversityMajor should not exist in DB');
    }
}

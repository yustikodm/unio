<?php namespace Tests\Repositories;

use App\Models\UniversityFaculties;
use App\Repositories\UniversityFacultiesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityFacultiesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityFacultiesRepository
     */
    protected $universityFacultiesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityFacultiesRepo = \App::make(UniversityFacultiesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->make()->toArray();

        $createdUniversityFaculties = $this->universityFacultiesRepo->create($universityFaculties);

        $createdUniversityFaculties = $createdUniversityFaculties->toArray();
        $this->assertArrayHasKey('id', $createdUniversityFaculties);
        $this->assertNotNull($createdUniversityFaculties['id'], 'Created UniversityFaculties must have id specified');
        $this->assertNotNull(UniversityFaculties::find($createdUniversityFaculties['id']), 'UniversityFaculties with given id must be in DB');
        $this->assertModelData($universityFaculties, $createdUniversityFaculties);
    }

    /**
     * @test read
     */
    public function test_read_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();

        $dbUniversityFaculties = $this->universityFacultiesRepo->find($universityFaculties->id);

        $dbUniversityFaculties = $dbUniversityFaculties->toArray();
        $this->assertModelData($universityFaculties->toArray(), $dbUniversityFaculties);
    }

    /**
     * @test update
     */
    public function test_update_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();
        $fakeUniversityFaculties = factory(UniversityFaculties::class)->make()->toArray();

        $updatedUniversityFaculties = $this->universityFacultiesRepo->update($fakeUniversityFaculties, $universityFaculties->id);

        $this->assertModelData($fakeUniversityFaculties, $updatedUniversityFaculties->toArray());
        $dbUniversityFaculties = $this->universityFacultiesRepo->find($universityFaculties->id);
        $this->assertModelData($fakeUniversityFaculties, $dbUniversityFaculties->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university_faculties()
    {
        $universityFaculties = factory(UniversityFaculties::class)->create();

        $resp = $this->universityFacultiesRepo->delete($universityFaculties->id);

        $this->assertTrue($resp);
        $this->assertNull(UniversityFaculties::find($universityFaculties->id), 'UniversityFaculties should not exist in DB');
    }
}

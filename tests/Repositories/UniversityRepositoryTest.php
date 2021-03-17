<?php namespace Tests\Repositories;

use App\Models\University;
use App\Repositories\UniversityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UniversityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversityRepository
     */
    protected $universityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->universityRepo = \App::make(UniversityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_university()
    {
        $university = factory(University::class)->make()->toArray();

        $createdUniversity = $this->universityRepo->create($university);

        $createdUniversity = $createdUniversity->toArray();
        $this->assertArrayHasKey('id', $createdUniversity);
        $this->assertNotNull($createdUniversity['id'], 'Created University must have id specified');
        $this->assertNotNull(University::find($createdUniversity['id']), 'University with given id must be in DB');
        $this->assertModelData($university, $createdUniversity);
    }

    /**
     * @test read
     */
    public function test_read_university()
    {
        $university = factory(University::class)->create();

        $dbUniversity = $this->universityRepo->find($university->id);

        $dbUniversity = $dbUniversity->toArray();
        $this->assertModelData($university->toArray(), $dbUniversity);
    }

    /**
     * @test update
     */
    public function test_update_university()
    {
        $university = factory(University::class)->create();
        $fakeUniversity = factory(University::class)->make()->toArray();

        $updatedUniversity = $this->universityRepo->update($fakeUniversity, $university->id);

        $this->assertModelData($fakeUniversity, $updatedUniversity->toArray());
        $dbUniversity = $this->universityRepo->find($university->id);
        $this->assertModelData($fakeUniversity, $dbUniversity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_university()
    {
        $university = factory(University::class)->create();

        $resp = $this->universityRepo->delete($university->id);

        $this->assertTrue($resp);
        $this->assertNull(University::find($university->id), 'University should not exist in DB');
    }
}

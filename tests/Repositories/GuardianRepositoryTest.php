<?php namespace Tests\Repositories;

use App\Models\Guardian;
use App\Repositories\GuardianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GuardianRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GuardianRepository
     */
    protected $guardianRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->guardianRepo = \App::make(GuardianRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_guardian()
    {
        $guardian = factory(Guardian::class)->make()->toArray();

        $createdGuardian = $this->guardianRepo->create($guardian);

        $createdGuardian = $createdGuardian->toArray();
        $this->assertArrayHasKey('id', $createdGuardian);
        $this->assertNotNull($createdGuardian['id'], 'Created Guardian must have id specified');
        $this->assertNotNull(Guardian::find($createdGuardian['id']), 'Guardian with given id must be in DB');
        $this->assertModelData($guardian, $createdGuardian);
    }

    /**
     * @test read
     */
    public function test_read_guardian()
    {
        $guardian = factory(Guardian::class)->create();

        $dbGuardian = $this->guardianRepo->find($guardian->id);

        $dbGuardian = $dbGuardian->toArray();
        $this->assertModelData($guardian->toArray(), $dbGuardian);
    }

    /**
     * @test update
     */
    public function test_update_guardian()
    {
        $guardian = factory(Guardian::class)->create();
        $fakeGuardian = factory(Guardian::class)->make()->toArray();

        $updatedGuardian = $this->guardianRepo->update($fakeGuardian, $guardian->id);

        $this->assertModelData($fakeGuardian, $updatedGuardian->toArray());
        $dbGuardian = $this->guardianRepo->find($guardian->id);
        $this->assertModelData($fakeGuardian, $dbGuardian->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_guardian()
    {
        $guardian = factory(Guardian::class)->create();

        $resp = $this->guardianRepo->delete($guardian->id);

        $this->assertTrue($resp);
        $this->assertNull(Guardian::find($guardian->id), 'Guardian should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PermissionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->permissionRepo = \App::make(PermissionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_permission()
    {
        $permission = factory(Permission::class)->make()->toArray();

        $createdPermission = $this->permissionRepo->create($permission);

        $createdPermission = $createdPermission->toArray();
        $this->assertArrayHasKey('id', $createdPermission);
        $this->assertNotNull($createdPermission['id'], 'Created Permission must have id specified');
        $this->assertNotNull(Permission::find($createdPermission['id']), 'Permission with given id must be in DB');
        $this->assertModelData($permission, $createdPermission);
    }

    /**
     * @test read
     */
    public function test_read_permission()
    {
        $permission = factory(Permission::class)->create();

        $dbPermission = $this->permissionRepo->find($permission->id);

        $dbPermission = $dbPermission->toArray();
        $this->assertModelData($permission->toArray(), $dbPermission);
    }

    /**
     * @test update
     */
    public function test_update_permission()
    {
        $permission = factory(Permission::class)->create();
        $fakePermission = factory(Permission::class)->make()->toArray();

        $updatedPermission = $this->permissionRepo->update($fakePermission, $permission->id);

        $this->assertModelData($fakePermission, $updatedPermission->toArray());
        $dbPermission = $this->permissionRepo->find($permission->id);
        $this->assertModelData($fakePermission, $dbPermission->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_permission()
    {
        $permission = factory(Permission::class)->create();

        $resp = $this->permissionRepo->delete($permission->id);

        $this->assertTrue($resp);
        $this->assertNull(Permission::find($permission->id), 'Permission should not exist in DB');
    }
}

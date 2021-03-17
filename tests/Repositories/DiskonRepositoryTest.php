<?php namespace Tests\Repositories;

use App\Models\Diskon;
use App\Repositories\DiskonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DiskonRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DiskonRepository
     */
    protected $diskonRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->diskonRepo = \App::make(DiskonRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_diskon()
    {
        $diskon = factory(Diskon::class)->make()->toArray();

        $createdDiskon = $this->diskonRepo->create($diskon);

        $createdDiskon = $createdDiskon->toArray();
        $this->assertArrayHasKey('id', $createdDiskon);
        $this->assertNotNull($createdDiskon['id'], 'Created Diskon must have id specified');
        $this->assertNotNull(Diskon::find($createdDiskon['id']), 'Diskon with given id must be in DB');
        $this->assertModelData($diskon, $createdDiskon);
    }

    /**
     * @test read
     */
    public function test_read_diskon()
    {
        $diskon = factory(Diskon::class)->create();

        $dbDiskon = $this->diskonRepo->find($diskon->id);

        $dbDiskon = $dbDiskon->toArray();
        $this->assertModelData($diskon->toArray(), $dbDiskon);
    }

    /**
     * @test update
     */
    public function test_update_diskon()
    {
        $diskon = factory(Diskon::class)->create();
        $fakeDiskon = factory(Diskon::class)->make()->toArray();

        $updatedDiskon = $this->diskonRepo->update($fakeDiskon, $diskon->id);

        $this->assertModelData($fakeDiskon, $updatedDiskon->toArray());
        $dbDiskon = $this->diskonRepo->find($diskon->id);
        $this->assertModelData($fakeDiskon, $dbDiskon->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_diskon()
    {
        $diskon = factory(Diskon::class)->create();

        $resp = $this->diskonRepo->delete($diskon->id);

        $this->assertTrue($resp);
        $this->assertNull(Diskon::find($diskon->id), 'Diskon should not exist in DB');
    }
}

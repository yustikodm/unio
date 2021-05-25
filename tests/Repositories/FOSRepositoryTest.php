<?php namespace Tests\Repositories;

use App\Models\FOS;
use App\Repositories\FOSRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FOSRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FOSRepository
     */
    protected $fOSRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fOSRepo = \App::make(FOSRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_f_o_s()
    {
        $fOS = factory(FOS::class)->make()->toArray();

        $createdFOS = $this->fOSRepo->create($fOS);

        $createdFOS = $createdFOS->toArray();
        $this->assertArrayHasKey('id', $createdFOS);
        $this->assertNotNull($createdFOS['id'], 'Created FOS must have id specified');
        $this->assertNotNull(FOS::find($createdFOS['id']), 'FOS with given id must be in DB');
        $this->assertModelData($fOS, $createdFOS);
    }

    /**
     * @test read
     */
    public function test_read_f_o_s()
    {
        $fOS = factory(FOS::class)->create();

        $dbFOS = $this->fOSRepo->find($fOS->id);

        $dbFOS = $dbFOS->toArray();
        $this->assertModelData($fOS->toArray(), $dbFOS);
    }

    /**
     * @test update
     */
    public function test_update_f_o_s()
    {
        $fOS = factory(FOS::class)->create();
        $fakeFOS = factory(FOS::class)->make()->toArray();

        $updatedFOS = $this->fOSRepo->update($fakeFOS, $fOS->id);

        $this->assertModelData($fakeFOS, $updatedFOS->toArray());
        $dbFOS = $this->fOSRepo->find($fOS->id);
        $this->assertModelData($fakeFOS, $dbFOS->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_f_o_s()
    {
        $fOS = factory(FOS::class)->create();

        $resp = $this->fOSRepo->delete($fOS->id);

        $this->assertTrue($resp);
        $this->assertNull(FOS::find($fOS->id), 'FOS should not exist in DB');
    }
}

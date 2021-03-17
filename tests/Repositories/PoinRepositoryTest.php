<?php namespace Tests\Repositories;

use App\Models\Poin;
use App\Repositories\PoinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PoinRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PoinRepository
     */
    protected $poinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->poinRepo = \App::make(PoinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_poin()
    {
        $poin = factory(Poin::class)->make()->toArray();

        $createdPoin = $this->poinRepo->create($poin);

        $createdPoin = $createdPoin->toArray();
        $this->assertArrayHasKey('id', $createdPoin);
        $this->assertNotNull($createdPoin['id'], 'Created Poin must have id specified');
        $this->assertNotNull(Poin::find($createdPoin['id']), 'Poin with given id must be in DB');
        $this->assertModelData($poin, $createdPoin);
    }

    /**
     * @test read
     */
    public function test_read_poin()
    {
        $poin = factory(Poin::class)->create();

        $dbPoin = $this->poinRepo->find($poin->id);

        $dbPoin = $dbPoin->toArray();
        $this->assertModelData($poin->toArray(), $dbPoin);
    }

    /**
     * @test update
     */
    public function test_update_poin()
    {
        $poin = factory(Poin::class)->create();
        $fakePoin = factory(Poin::class)->make()->toArray();

        $updatedPoin = $this->poinRepo->update($fakePoin, $poin->id);

        $this->assertModelData($fakePoin, $updatedPoin->toArray());
        $dbPoin = $this->poinRepo->find($poin->id);
        $this->assertModelData($fakePoin, $dbPoin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_poin()
    {
        $poin = factory(Poin::class)->create();

        $resp = $this->poinRepo->delete($poin->id);

        $this->assertTrue($resp);
        $this->assertNull(Poin::find($poin->id), 'Poin should not exist in DB');
    }
}

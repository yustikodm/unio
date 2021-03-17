<?php namespace Tests\Repositories;

use App\Models\Stok;
use App\Repositories\StokRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StokRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StokRepository
     */
    protected $stokRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stokRepo = \App::make(StokRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stok()
    {
        $stok = factory(Stok::class)->make()->toArray();

        $createdStok = $this->stokRepo->create($stok);

        $createdStok = $createdStok->toArray();
        $this->assertArrayHasKey('id', $createdStok);
        $this->assertNotNull($createdStok['id'], 'Created Stok must have id specified');
        $this->assertNotNull(Stok::find($createdStok['id']), 'Stok with given id must be in DB');
        $this->assertModelData($stok, $createdStok);
    }

    /**
     * @test read
     */
    public function test_read_stok()
    {
        $stok = factory(Stok::class)->create();

        $dbStok = $this->stokRepo->find($stok->id);

        $dbStok = $dbStok->toArray();
        $this->assertModelData($stok->toArray(), $dbStok);
    }

    /**
     * @test update
     */
    public function test_update_stok()
    {
        $stok = factory(Stok::class)->create();
        $fakeStok = factory(Stok::class)->make()->toArray();

        $updatedStok = $this->stokRepo->update($fakeStok, $stok->id);

        $this->assertModelData($fakeStok, $updatedStok->toArray());
        $dbStok = $this->stokRepo->find($stok->id);
        $this->assertModelData($fakeStok, $dbStok->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stok()
    {
        $stok = factory(Stok::class)->create();

        $resp = $this->stokRepo->delete($stok->id);

        $this->assertTrue($resp);
        $this->assertNull(Stok::find($stok->id), 'Stok should not exist in DB');
    }
}

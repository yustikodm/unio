<?php namespace Tests\Repositories;

use App\Models\PenerimaanRetur;
use App\Repositories\PenerimaanReturRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PenerimaanReturRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PenerimaanReturRepository
     */
    protected $penerimaanReturRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->penerimaanReturRepo = \App::make(PenerimaanReturRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->make()->toArray();

        $createdPenerimaanRetur = $this->penerimaanReturRepo->create($penerimaanRetur);

        $createdPenerimaanRetur = $createdPenerimaanRetur->toArray();
        $this->assertArrayHasKey('id', $createdPenerimaanRetur);
        $this->assertNotNull($createdPenerimaanRetur['id'], 'Created PenerimaanRetur must have id specified');
        $this->assertNotNull(PenerimaanRetur::find($createdPenerimaanRetur['id']), 'PenerimaanRetur with given id must be in DB');
        $this->assertModelData($penerimaanRetur, $createdPenerimaanRetur);
    }

    /**
     * @test read
     */
    public function test_read_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();

        $dbPenerimaanRetur = $this->penerimaanReturRepo->find($penerimaanRetur->id);

        $dbPenerimaanRetur = $dbPenerimaanRetur->toArray();
        $this->assertModelData($penerimaanRetur->toArray(), $dbPenerimaanRetur);
    }

    /**
     * @test update
     */
    public function test_update_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();
        $fakePenerimaanRetur = factory(PenerimaanRetur::class)->make()->toArray();

        $updatedPenerimaanRetur = $this->penerimaanReturRepo->update($fakePenerimaanRetur, $penerimaanRetur->id);

        $this->assertModelData($fakePenerimaanRetur, $updatedPenerimaanRetur->toArray());
        $dbPenerimaanRetur = $this->penerimaanReturRepo->find($penerimaanRetur->id);
        $this->assertModelData($fakePenerimaanRetur, $dbPenerimaanRetur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_penerimaan_retur()
    {
        $penerimaanRetur = factory(PenerimaanRetur::class)->create();

        $resp = $this->penerimaanReturRepo->delete($penerimaanRetur->id);

        $this->assertTrue($resp);
        $this->assertNull(PenerimaanRetur::find($penerimaanRetur->id), 'PenerimaanRetur should not exist in DB');
    }
}

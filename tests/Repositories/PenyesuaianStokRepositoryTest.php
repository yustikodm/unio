<?php namespace Tests\Repositories;

use App\Models\PenyesuaianStok;
use App\Repositories\PenyesuaianStokRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PenyesuaianStokRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PenyesuaianStokRepository
     */
    protected $penyesuaianStokRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->penyesuaianStokRepo = \App::make(PenyesuaianStokRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->make()->toArray();

        $createdPenyesuaianStok = $this->penyesuaianStokRepo->create($penyesuaianStok);

        $createdPenyesuaianStok = $createdPenyesuaianStok->toArray();
        $this->assertArrayHasKey('id', $createdPenyesuaianStok);
        $this->assertNotNull($createdPenyesuaianStok['id'], 'Created PenyesuaianStok must have id specified');
        $this->assertNotNull(PenyesuaianStok::find($createdPenyesuaianStok['id']), 'PenyesuaianStok with given id must be in DB');
        $this->assertModelData($penyesuaianStok, $createdPenyesuaianStok);
    }

    /**
     * @test read
     */
    public function test_read_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();

        $dbPenyesuaianStok = $this->penyesuaianStokRepo->find($penyesuaianStok->id);

        $dbPenyesuaianStok = $dbPenyesuaianStok->toArray();
        $this->assertModelData($penyesuaianStok->toArray(), $dbPenyesuaianStok);
    }

    /**
     * @test update
     */
    public function test_update_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();
        $fakePenyesuaianStok = factory(PenyesuaianStok::class)->make()->toArray();

        $updatedPenyesuaianStok = $this->penyesuaianStokRepo->update($fakePenyesuaianStok, $penyesuaianStok->id);

        $this->assertModelData($fakePenyesuaianStok, $updatedPenyesuaianStok->toArray());
        $dbPenyesuaianStok = $this->penyesuaianStokRepo->find($penyesuaianStok->id);
        $this->assertModelData($fakePenyesuaianStok, $dbPenyesuaianStok->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_penyesuaian_stok()
    {
        $penyesuaianStok = factory(PenyesuaianStok::class)->create();

        $resp = $this->penyesuaianStokRepo->delete($penyesuaianStok->id);

        $this->assertTrue($resp);
        $this->assertNull(PenyesuaianStok::find($penyesuaianStok->id), 'PenyesuaianStok should not exist in DB');
    }
}

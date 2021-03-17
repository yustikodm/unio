<?php namespace Tests\Repositories;

use App\Models\RekapStok;
use App\Repositories\RekapStokRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RekapStokRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RekapStokRepository
     */
    protected $rekapStokRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->rekapStokRepo = \App::make(RekapStokRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->make()->toArray();

        $createdRekapStok = $this->rekapStokRepo->create($rekapStok);

        $createdRekapStok = $createdRekapStok->toArray();
        $this->assertArrayHasKey('id', $createdRekapStok);
        $this->assertNotNull($createdRekapStok['id'], 'Created RekapStok must have id specified');
        $this->assertNotNull(RekapStok::find($createdRekapStok['id']), 'RekapStok with given id must be in DB');
        $this->assertModelData($rekapStok, $createdRekapStok);
    }

    /**
     * @test read
     */
    public function test_read_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();

        $dbRekapStok = $this->rekapStokRepo->find($rekapStok->id);

        $dbRekapStok = $dbRekapStok->toArray();
        $this->assertModelData($rekapStok->toArray(), $dbRekapStok);
    }

    /**
     * @test update
     */
    public function test_update_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();
        $fakeRekapStok = factory(RekapStok::class)->make()->toArray();

        $updatedRekapStok = $this->rekapStokRepo->update($fakeRekapStok, $rekapStok->id);

        $this->assertModelData($fakeRekapStok, $updatedRekapStok->toArray());
        $dbRekapStok = $this->rekapStokRepo->find($rekapStok->id);
        $this->assertModelData($fakeRekapStok, $dbRekapStok->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_rekap_stok()
    {
        $rekapStok = factory(RekapStok::class)->create();

        $resp = $this->rekapStokRepo->delete($rekapStok->id);

        $this->assertTrue($resp);
        $this->assertNull(RekapStok::find($rekapStok->id), 'RekapStok should not exist in DB');
    }
}

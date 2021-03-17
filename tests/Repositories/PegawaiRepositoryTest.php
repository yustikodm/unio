<?php namespace Tests\Repositories;

use App\Models\Pegawai;
use App\Repositories\PegawaiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PegawaiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PegawaiRepository
     */
    protected $pegawaiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pegawaiRepo = \App::make(PegawaiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pegawai()
    {
        $pegawai = factory(Pegawai::class)->make()->toArray();

        $createdPegawai = $this->pegawaiRepo->create($pegawai);

        $createdPegawai = $createdPegawai->toArray();
        $this->assertArrayHasKey('id', $createdPegawai);
        $this->assertNotNull($createdPegawai['id'], 'Created Pegawai must have id specified');
        $this->assertNotNull(Pegawai::find($createdPegawai['id']), 'Pegawai with given id must be in DB');
        $this->assertModelData($pegawai, $createdPegawai);
    }

    /**
     * @test read
     */
    public function test_read_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();

        $dbPegawai = $this->pegawaiRepo->find($pegawai->id);

        $dbPegawai = $dbPegawai->toArray();
        $this->assertModelData($pegawai->toArray(), $dbPegawai);
    }

    /**
     * @test update
     */
    public function test_update_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();
        $fakePegawai = factory(Pegawai::class)->make()->toArray();

        $updatedPegawai = $this->pegawaiRepo->update($fakePegawai, $pegawai->id);

        $this->assertModelData($fakePegawai, $updatedPegawai->toArray());
        $dbPegawai = $this->pegawaiRepo->find($pegawai->id);
        $this->assertModelData($fakePegawai, $dbPegawai->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pegawai()
    {
        $pegawai = factory(Pegawai::class)->create();

        $resp = $this->pegawaiRepo->delete($pegawai->id);

        $this->assertTrue($resp);
        $this->assertNull(Pegawai::find($pegawai->id), 'Pegawai should not exist in DB');
    }
}

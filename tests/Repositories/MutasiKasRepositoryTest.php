<?php namespace Tests\Repositories;

use App\Models\MutasiKas;
use App\Repositories\MutasiKasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MutasiKasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MutasiKasRepository
     */
    protected $mutasiKasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->mutasiKasRepo = \App::make(MutasiKasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->make()->toArray();

        $createdMutasiKas = $this->mutasiKasRepo->create($mutasiKas);

        $createdMutasiKas = $createdMutasiKas->toArray();
        $this->assertArrayHasKey('id', $createdMutasiKas);
        $this->assertNotNull($createdMutasiKas['id'], 'Created MutasiKas must have id specified');
        $this->assertNotNull(MutasiKas::find($createdMutasiKas['id']), 'MutasiKas with given id must be in DB');
        $this->assertModelData($mutasiKas, $createdMutasiKas);
    }

    /**
     * @test read
     */
    public function test_read_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();

        $dbMutasiKas = $this->mutasiKasRepo->find($mutasiKas->id);

        $dbMutasiKas = $dbMutasiKas->toArray();
        $this->assertModelData($mutasiKas->toArray(), $dbMutasiKas);
    }

    /**
     * @test update
     */
    public function test_update_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();
        $fakeMutasiKas = factory(MutasiKas::class)->make()->toArray();

        $updatedMutasiKas = $this->mutasiKasRepo->update($fakeMutasiKas, $mutasiKas->id);

        $this->assertModelData($fakeMutasiKas, $updatedMutasiKas->toArray());
        $dbMutasiKas = $this->mutasiKasRepo->find($mutasiKas->id);
        $this->assertModelData($fakeMutasiKas, $dbMutasiKas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_mutasi_kas()
    {
        $mutasiKas = factory(MutasiKas::class)->create();

        $resp = $this->mutasiKasRepo->delete($mutasiKas->id);

        $this->assertTrue($resp);
        $this->assertNull(MutasiKas::find($mutasiKas->id), 'MutasiKas should not exist in DB');
    }
}

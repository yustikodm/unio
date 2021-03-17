<?php namespace Tests\Repositories;

use App\Models\Pekerjaan;
use App\Repositories\PekerjaanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PekerjaanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PekerjaanRepository
     */
    protected $pekerjaanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pekerjaanRepo = \App::make(PekerjaanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->make()->toArray();

        $createdPekerjaan = $this->pekerjaanRepo->create($pekerjaan);

        $createdPekerjaan = $createdPekerjaan->toArray();
        $this->assertArrayHasKey('id', $createdPekerjaan);
        $this->assertNotNull($createdPekerjaan['id'], 'Created Pekerjaan must have id specified');
        $this->assertNotNull(Pekerjaan::find($createdPekerjaan['id']), 'Pekerjaan with given id must be in DB');
        $this->assertModelData($pekerjaan, $createdPekerjaan);
    }

    /**
     * @test read
     */
    public function test_read_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();

        $dbPekerjaan = $this->pekerjaanRepo->find($pekerjaan->id);

        $dbPekerjaan = $dbPekerjaan->toArray();
        $this->assertModelData($pekerjaan->toArray(), $dbPekerjaan);
    }

    /**
     * @test update
     */
    public function test_update_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();
        $fakePekerjaan = factory(Pekerjaan::class)->make()->toArray();

        $updatedPekerjaan = $this->pekerjaanRepo->update($fakePekerjaan, $pekerjaan->id);

        $this->assertModelData($fakePekerjaan, $updatedPekerjaan->toArray());
        $dbPekerjaan = $this->pekerjaanRepo->find($pekerjaan->id);
        $this->assertModelData($fakePekerjaan, $dbPekerjaan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pekerjaan()
    {
        $pekerjaan = factory(Pekerjaan::class)->create();

        $resp = $this->pekerjaanRepo->delete($pekerjaan->id);

        $this->assertTrue($resp);
        $this->assertNull(Pekerjaan::find($pekerjaan->id), 'Pekerjaan should not exist in DB');
    }
}

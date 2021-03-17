<?php namespace Tests\Repositories;

use App\Models\Jabatan;
use App\Repositories\JabatanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JabatanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JabatanRepository
     */
    protected $jabatanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jabatanRepo = \App::make(JabatanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jabatan()
    {
        $jabatan = factory(Jabatan::class)->make()->toArray();

        $createdJabatan = $this->jabatanRepo->create($jabatan);

        $createdJabatan = $createdJabatan->toArray();
        $this->assertArrayHasKey('id', $createdJabatan);
        $this->assertNotNull($createdJabatan['id'], 'Created Jabatan must have id specified');
        $this->assertNotNull(Jabatan::find($createdJabatan['id']), 'Jabatan with given id must be in DB');
        $this->assertModelData($jabatan, $createdJabatan);
    }

    /**
     * @test read
     */
    public function test_read_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();

        $dbJabatan = $this->jabatanRepo->find($jabatan->id);

        $dbJabatan = $dbJabatan->toArray();
        $this->assertModelData($jabatan->toArray(), $dbJabatan);
    }

    /**
     * @test update
     */
    public function test_update_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();
        $fakeJabatan = factory(Jabatan::class)->make()->toArray();

        $updatedJabatan = $this->jabatanRepo->update($fakeJabatan, $jabatan->id);

        $this->assertModelData($fakeJabatan, $updatedJabatan->toArray());
        $dbJabatan = $this->jabatanRepo->find($jabatan->id);
        $this->assertModelData($fakeJabatan, $dbJabatan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jabatan()
    {
        $jabatan = factory(Jabatan::class)->create();

        $resp = $this->jabatanRepo->delete($jabatan->id);

        $this->assertTrue($resp);
        $this->assertNull(Jabatan::find($jabatan->id), 'Jabatan should not exist in DB');
    }
}

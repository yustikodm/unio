<?php namespace Tests\Repositories;

use App\Models\Biodata;
use App\Repositories\BiodataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BiodataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BiodataRepository
     */
    protected $biodataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->biodataRepo = \App::make(BiodataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_biodata()
    {
        $biodata = factory(Biodata::class)->make()->toArray();

        $createdBiodata = $this->biodataRepo->create($biodata);

        $createdBiodata = $createdBiodata->toArray();
        $this->assertArrayHasKey('id', $createdBiodata);
        $this->assertNotNull($createdBiodata['id'], 'Created Biodata must have id specified');
        $this->assertNotNull(Biodata::find($createdBiodata['id']), 'Biodata with given id must be in DB');
        $this->assertModelData($biodata, $createdBiodata);
    }

    /**
     * @test read
     */
    public function test_read_biodata()
    {
        $biodata = factory(Biodata::class)->create();

        $dbBiodata = $this->biodataRepo->find($biodata->id);

        $dbBiodata = $dbBiodata->toArray();
        $this->assertModelData($biodata->toArray(), $dbBiodata);
    }

    /**
     * @test update
     */
    public function test_update_biodata()
    {
        $biodata = factory(Biodata::class)->create();
        $fakeBiodata = factory(Biodata::class)->make()->toArray();

        $updatedBiodata = $this->biodataRepo->update($fakeBiodata, $biodata->id);

        $this->assertModelData($fakeBiodata, $updatedBiodata->toArray());
        $dbBiodata = $this->biodataRepo->find($biodata->id);
        $this->assertModelData($fakeBiodata, $dbBiodata->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_biodata()
    {
        $biodata = factory(Biodata::class)->create();

        $resp = $this->biodataRepo->delete($biodata->id);

        $this->assertTrue($resp);
        $this->assertNull(Biodata::find($biodata->id), 'Biodata should not exist in DB');
    }
}

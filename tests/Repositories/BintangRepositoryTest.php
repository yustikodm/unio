<?php namespace Tests\Repositories;

use App\Models\Bintang;
use App\Repositories\BintangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BintangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BintangRepository
     */
    protected $bintangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bintangRepo = \App::make(BintangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bintang()
    {
        $bintang = factory(Bintang::class)->make()->toArray();

        $createdBintang = $this->bintangRepo->create($bintang);

        $createdBintang = $createdBintang->toArray();
        $this->assertArrayHasKey('id', $createdBintang);
        $this->assertNotNull($createdBintang['id'], 'Created Bintang must have id specified');
        $this->assertNotNull(Bintang::find($createdBintang['id']), 'Bintang with given id must be in DB');
        $this->assertModelData($bintang, $createdBintang);
    }

    /**
     * @test read
     */
    public function test_read_bintang()
    {
        $bintang = factory(Bintang::class)->create();

        $dbBintang = $this->bintangRepo->find($bintang->id);

        $dbBintang = $dbBintang->toArray();
        $this->assertModelData($bintang->toArray(), $dbBintang);
    }

    /**
     * @test update
     */
    public function test_update_bintang()
    {
        $bintang = factory(Bintang::class)->create();
        $fakeBintang = factory(Bintang::class)->make()->toArray();

        $updatedBintang = $this->bintangRepo->update($fakeBintang, $bintang->id);

        $this->assertModelData($fakeBintang, $updatedBintang->toArray());
        $dbBintang = $this->bintangRepo->find($bintang->id);
        $this->assertModelData($fakeBintang, $dbBintang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bintang()
    {
        $bintang = factory(Bintang::class)->create();

        $resp = $this->bintangRepo->delete($bintang->id);

        $this->assertTrue($resp);
        $this->assertNull(Bintang::find($bintang->id), 'Bintang should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\Hadiah;
use App\Repositories\HadiahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HadiahRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HadiahRepository
     */
    protected $hadiahRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hadiahRepo = \App::make(HadiahRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hadiah()
    {
        $hadiah = factory(Hadiah::class)->make()->toArray();

        $createdHadiah = $this->hadiahRepo->create($hadiah);

        $createdHadiah = $createdHadiah->toArray();
        $this->assertArrayHasKey('id', $createdHadiah);
        $this->assertNotNull($createdHadiah['id'], 'Created Hadiah must have id specified');
        $this->assertNotNull(Hadiah::find($createdHadiah['id']), 'Hadiah with given id must be in DB');
        $this->assertModelData($hadiah, $createdHadiah);
    }

    /**
     * @test read
     */
    public function test_read_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();

        $dbHadiah = $this->hadiahRepo->find($hadiah->id);

        $dbHadiah = $dbHadiah->toArray();
        $this->assertModelData($hadiah->toArray(), $dbHadiah);
    }

    /**
     * @test update
     */
    public function test_update_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();
        $fakeHadiah = factory(Hadiah::class)->make()->toArray();

        $updatedHadiah = $this->hadiahRepo->update($fakeHadiah, $hadiah->id);

        $this->assertModelData($fakeHadiah, $updatedHadiah->toArray());
        $dbHadiah = $this->hadiahRepo->find($hadiah->id);
        $this->assertModelData($fakeHadiah, $dbHadiah->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hadiah()
    {
        $hadiah = factory(Hadiah::class)->create();

        $resp = $this->hadiahRepo->delete($hadiah->id);

        $this->assertTrue($resp);
        $this->assertNull(Hadiah::find($hadiah->id), 'Hadiah should not exist in DB');
    }
}

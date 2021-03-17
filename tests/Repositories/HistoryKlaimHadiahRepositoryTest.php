<?php namespace Tests\Repositories;

use App\Models\HistoryKlaimHadiah;
use App\Repositories\HistoryKlaimHadiahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HistoryKlaimHadiahRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HistoryKlaimHadiahRepository
     */
    protected $historyKlaimHadiahRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->historyKlaimHadiahRepo = \App::make(HistoryKlaimHadiahRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->make()->toArray();

        $createdHistoryKlaimHadiah = $this->historyKlaimHadiahRepo->create($historyKlaimHadiah);

        $createdHistoryKlaimHadiah = $createdHistoryKlaimHadiah->toArray();
        $this->assertArrayHasKey('id', $createdHistoryKlaimHadiah);
        $this->assertNotNull($createdHistoryKlaimHadiah['id'], 'Created HistoryKlaimHadiah must have id specified');
        $this->assertNotNull(HistoryKlaimHadiah::find($createdHistoryKlaimHadiah['id']), 'HistoryKlaimHadiah with given id must be in DB');
        $this->assertModelData($historyKlaimHadiah, $createdHistoryKlaimHadiah);
    }

    /**
     * @test read
     */
    public function test_read_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();

        $dbHistoryKlaimHadiah = $this->historyKlaimHadiahRepo->find($historyKlaimHadiah->id);

        $dbHistoryKlaimHadiah = $dbHistoryKlaimHadiah->toArray();
        $this->assertModelData($historyKlaimHadiah->toArray(), $dbHistoryKlaimHadiah);
    }

    /**
     * @test update
     */
    public function test_update_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();
        $fakeHistoryKlaimHadiah = factory(HistoryKlaimHadiah::class)->make()->toArray();

        $updatedHistoryKlaimHadiah = $this->historyKlaimHadiahRepo->update($fakeHistoryKlaimHadiah, $historyKlaimHadiah->id);

        $this->assertModelData($fakeHistoryKlaimHadiah, $updatedHistoryKlaimHadiah->toArray());
        $dbHistoryKlaimHadiah = $this->historyKlaimHadiahRepo->find($historyKlaimHadiah->id);
        $this->assertModelData($fakeHistoryKlaimHadiah, $dbHistoryKlaimHadiah->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_history_klaim_hadiah()
    {
        $historyKlaimHadiah = factory(HistoryKlaimHadiah::class)->create();

        $resp = $this->historyKlaimHadiahRepo->delete($historyKlaimHadiah->id);

        $this->assertTrue($resp);
        $this->assertNull(HistoryKlaimHadiah::find($historyKlaimHadiah->id), 'HistoryKlaimHadiah should not exist in DB');
    }
}

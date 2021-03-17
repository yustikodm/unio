<?php namespace Tests\Repositories;

use App\Models\Bonus;
use App\Repositories\BonusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BonusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BonusRepository
     */
    protected $bonusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bonusRepo = \App::make(BonusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bonus()
    {
        $bonus = factory(Bonus::class)->make()->toArray();

        $createdBonus = $this->bonusRepo->create($bonus);

        $createdBonus = $createdBonus->toArray();
        $this->assertArrayHasKey('id', $createdBonus);
        $this->assertNotNull($createdBonus['id'], 'Created Bonus must have id specified');
        $this->assertNotNull(Bonus::find($createdBonus['id']), 'Bonus with given id must be in DB');
        $this->assertModelData($bonus, $createdBonus);
    }

    /**
     * @test read
     */
    public function test_read_bonus()
    {
        $bonus = factory(Bonus::class)->create();

        $dbBonus = $this->bonusRepo->find($bonus->id);

        $dbBonus = $dbBonus->toArray();
        $this->assertModelData($bonus->toArray(), $dbBonus);
    }

    /**
     * @test update
     */
    public function test_update_bonus()
    {
        $bonus = factory(Bonus::class)->create();
        $fakeBonus = factory(Bonus::class)->make()->toArray();

        $updatedBonus = $this->bonusRepo->update($fakeBonus, $bonus->id);

        $this->assertModelData($fakeBonus, $updatedBonus->toArray());
        $dbBonus = $this->bonusRepo->find($bonus->id);
        $this->assertModelData($fakeBonus, $dbBonus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bonus()
    {
        $bonus = factory(Bonus::class)->create();

        $resp = $this->bonusRepo->delete($bonus->id);

        $this->assertTrue($resp);
        $this->assertNull(Bonus::find($bonus->id), 'Bonus should not exist in DB');
    }
}

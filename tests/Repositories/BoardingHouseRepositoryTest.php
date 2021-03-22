<?php namespace Tests\Repositories;

use App\Models\BoardingHouse;
use App\Repositories\BoardingHouseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BoardingHouseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BoardingHouseRepository
     */
    protected $boardingHouseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->boardingHouseRepo = \App::make(BoardingHouseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->make()->toArray();

        $createdBoardingHouse = $this->boardingHouseRepo->create($boardingHouse);

        $createdBoardingHouse = $createdBoardingHouse->toArray();
        $this->assertArrayHasKey('id', $createdBoardingHouse);
        $this->assertNotNull($createdBoardingHouse['id'], 'Created BoardingHouse must have id specified');
        $this->assertNotNull(BoardingHouse::find($createdBoardingHouse['id']), 'BoardingHouse with given id must be in DB');
        $this->assertModelData($boardingHouse, $createdBoardingHouse);
    }

    /**
     * @test read
     */
    public function test_read_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();

        $dbBoardingHouse = $this->boardingHouseRepo->find($boardingHouse->id);

        $dbBoardingHouse = $dbBoardingHouse->toArray();
        $this->assertModelData($boardingHouse->toArray(), $dbBoardingHouse);
    }

    /**
     * @test update
     */
    public function test_update_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();
        $fakeBoardingHouse = factory(BoardingHouse::class)->make()->toArray();

        $updatedBoardingHouse = $this->boardingHouseRepo->update($fakeBoardingHouse, $boardingHouse->id);

        $this->assertModelData($fakeBoardingHouse, $updatedBoardingHouse->toArray());
        $dbBoardingHouse = $this->boardingHouseRepo->find($boardingHouse->id);
        $this->assertModelData($fakeBoardingHouse, $dbBoardingHouse->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_boarding_house()
    {
        $boardingHouse = factory(BoardingHouse::class)->create();

        $resp = $this->boardingHouseRepo->delete($boardingHouse->id);

        $this->assertTrue($resp);
        $this->assertNull(BoardingHouse::find($boardingHouse->id), 'BoardingHouse should not exist in DB');
    }
}

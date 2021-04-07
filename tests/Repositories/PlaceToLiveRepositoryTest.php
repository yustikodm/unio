<?php namespace Tests\Repositories;

use App\Models\PlaceToLive;
use App\Repositories\PlaceToLiveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PlaceToLiveRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PlaceToLiveRepository
     */
    protected $placeToLiveRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->placeToLiveRepo = \App::make(PlaceToLiveRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->make()->toArray();

        $createdPlaceToLive = $this->placeToLiveRepo->create($placeToLive);

        $createdPlaceToLive = $createdPlaceToLive->toArray();
        $this->assertArrayHasKey('id', $createdPlaceToLive);
        $this->assertNotNull($createdPlaceToLive['id'], 'Created PlaceToLive must have id specified');
        $this->assertNotNull(PlaceToLive::find($createdPlaceToLive['id']), 'PlaceToLive with given id must be in DB');
        $this->assertModelData($placeToLive, $createdPlaceToLive);
    }

    /**
     * @test read
     */
    public function test_read_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();

        $dbPlaceToLive = $this->placeToLiveRepo->find($placeToLive->id);

        $dbPlaceToLive = $dbPlaceToLive->toArray();
        $this->assertModelData($placeToLive->toArray(), $dbPlaceToLive);
    }

    /**
     * @test update
     */
    public function test_update_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();
        $fakePlaceToLive = factory(PlaceToLive::class)->make()->toArray();

        $updatedPlaceToLive = $this->placeToLiveRepo->update($fakePlaceToLive, $placeToLive->id);

        $this->assertModelData($fakePlaceToLive, $updatedPlaceToLive->toArray());
        $dbPlaceToLive = $this->placeToLiveRepo->find($placeToLive->id);
        $this->assertModelData($fakePlaceToLive, $dbPlaceToLive->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_place_to_live()
    {
        $placeToLive = factory(PlaceToLive::class)->create();

        $resp = $this->placeToLiveRepo->delete($placeToLive->id);

        $this->assertTrue($resp);
        $this->assertNull(PlaceToLive::find($placeToLive->id), 'PlaceToLive should not exist in DB');
    }
}

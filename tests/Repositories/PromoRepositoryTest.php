<?php namespace Tests\Repositories;

use App\Models\Promo;
use App\Repositories\PromoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PromoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PromoRepository
     */
    protected $promoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->promoRepo = \App::make(PromoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_promo()
    {
        $promo = factory(Promo::class)->make()->toArray();

        $createdPromo = $this->promoRepo->create($promo);

        $createdPromo = $createdPromo->toArray();
        $this->assertArrayHasKey('id', $createdPromo);
        $this->assertNotNull($createdPromo['id'], 'Created Promo must have id specified');
        $this->assertNotNull(Promo::find($createdPromo['id']), 'Promo with given id must be in DB');
        $this->assertModelData($promo, $createdPromo);
    }

    /**
     * @test read
     */
    public function test_read_promo()
    {
        $promo = factory(Promo::class)->create();

        $dbPromo = $this->promoRepo->find($promo->id);

        $dbPromo = $dbPromo->toArray();
        $this->assertModelData($promo->toArray(), $dbPromo);
    }

    /**
     * @test update
     */
    public function test_update_promo()
    {
        $promo = factory(Promo::class)->create();
        $fakePromo = factory(Promo::class)->make()->toArray();

        $updatedPromo = $this->promoRepo->update($fakePromo, $promo->id);

        $this->assertModelData($fakePromo, $updatedPromo->toArray());
        $dbPromo = $this->promoRepo->find($promo->id);
        $this->assertModelData($fakePromo, $dbPromo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_promo()
    {
        $promo = factory(Promo::class)->create();

        $resp = $this->promoRepo->delete($promo->id);

        $this->assertTrue($resp);
        $this->assertNull(Promo::find($promo->id), 'Promo should not exist in DB');
    }
}

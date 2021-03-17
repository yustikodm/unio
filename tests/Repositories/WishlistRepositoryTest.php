<?php namespace Tests\Repositories;

use App\Models\Wishlist;
use App\Repositories\WishlistRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WishlistRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WishlistRepository
     */
    protected $wishlistRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->wishlistRepo = \App::make(WishlistRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_wishlist()
    {
        $wishlist = factory(Wishlist::class)->make()->toArray();

        $createdWishlist = $this->wishlistRepo->create($wishlist);

        $createdWishlist = $createdWishlist->toArray();
        $this->assertArrayHasKey('id', $createdWishlist);
        $this->assertNotNull($createdWishlist['id'], 'Created Wishlist must have id specified');
        $this->assertNotNull(Wishlist::find($createdWishlist['id']), 'Wishlist with given id must be in DB');
        $this->assertModelData($wishlist, $createdWishlist);
    }

    /**
     * @test read
     */
    public function test_read_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();

        $dbWishlist = $this->wishlistRepo->find($wishlist->id);

        $dbWishlist = $dbWishlist->toArray();
        $this->assertModelData($wishlist->toArray(), $dbWishlist);
    }

    /**
     * @test update
     */
    public function test_update_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();
        $fakeWishlist = factory(Wishlist::class)->make()->toArray();

        $updatedWishlist = $this->wishlistRepo->update($fakeWishlist, $wishlist->id);

        $this->assertModelData($fakeWishlist, $updatedWishlist->toArray());
        $dbWishlist = $this->wishlistRepo->find($wishlist->id);
        $this->assertModelData($fakeWishlist, $dbWishlist->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();

        $resp = $this->wishlistRepo->delete($wishlist->id);

        $this->assertTrue($resp);
        $this->assertNull(Wishlist::find($wishlist->id), 'Wishlist should not exist in DB');
    }
}

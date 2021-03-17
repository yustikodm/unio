<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Wishlist;

class WishlistApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_wishlist()
    {
        $wishlist = factory(Wishlist::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/wishlists', $wishlist
        );

        $this->assertApiResponse($wishlist);
    }

    /**
     * @test
     */
    public function test_read_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/wishlists/'.$wishlist->id
        );

        $this->assertApiResponse($wishlist->toArray());
    }

    /**
     * @test
     */
    public function test_update_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();
        $editedWishlist = factory(Wishlist::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/wishlists/'.$wishlist->id,
            $editedWishlist
        );

        $this->assertApiResponse($editedWishlist);
    }

    /**
     * @test
     */
    public function test_delete_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/wishlists/'.$wishlist->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/wishlists/'.$wishlist->id
        );

        $this->response->assertStatus(404);
    }
}

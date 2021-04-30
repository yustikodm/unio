<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWishlistAPIRequest;
use App\Http\Requests\API\UpdateWishlistAPIRequest;
use App\Models\Wishlist;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\WishlistResource;
use Response;

/**
 * Class WishlistController
 * @package App\Http\Controllers\API
 */

class WishlistAPIController extends AppBaseController
{
    /** @var  WishlistRepository */
    private $wishlistRepository;

    public function __construct(WishlistRepository $wishlistRepo)
    {
        $this->wishlistRepository = $wishlistRepo;
    }

    /**
     * Display a listing of the Wishlist.
     * GET|HEAD /wishlists
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $wishlists = $this->wishlistRepository->paginate(15);

        return $this->sendResponse($wishlists, 'Wishlists retrieved successfully');
    }

    /**
     * Store a newly created Wishlist in storage.
     * POST /wishlists
     *
     * @param CreateWishlistAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWishlistAPIRequest $request)
    {
        $input = $request->only([
            'entity_id',
            'entity_type',
            'user_id',
        ]);

        if (!in_array($input['entity_type'], ['vendors', 'services', 'universities', 'majors'])) {
            return $this->sendError('Error insert data to wishlist!');
        }

        $wishlist = $this->wishlistRepository->create($input);

        return $this->sendResponse(new WishlistResource($wishlist), 'Wishlist saved successfully');
    }

    /**
     * Remove the specified Wishlist from storage.
     * DELETE /wishlists/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Wishlist $wishlist */
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            return $this->sendError('Wishlist not found');
        }

        $wishlist->delete();

        return $this->sendSuccess('asd Wishlist deleted successfully');
    }

    public function current()
    {
        $wishlist = $this->wishlistRepository->currentUser();

        return $this->sendResponse(WishlistResource::collection($wishlist), 'Wishlist saved successfully');
    }
}

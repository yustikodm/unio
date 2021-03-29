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
        $wishlists = $this->wishlistRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WishlistResource::collection($wishlists), 'Wishlists retrieved successfully');
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
            'university_id',
            'major_id',
            'service_id',
            'user_id',
            'description'
        ]);

        $wishlist = $this->wishlistRepository->create($input);

        return $this->sendResponse(new WishlistResource($wishlist), 'Wishlist saved successfully');
    }

    /**
     * Display the specified Wishlist.
     * GET|HEAD /wishlists/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Wishlist $wishlist */
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            return $this->sendError('Wishlist not found');
        }

        return $this->sendResponse(new WishlistResource($wishlist), 'Wishlist retrieved successfully');
    }

    /**
     * Update the specified Wishlist in storage.
     * PUT/PATCH /wishlists/{id}
     *
     * @param int $id
     * @param UpdateWishlistAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWishlistAPIRequest $request)
    {
        $input = $request->only([
            'university_id',
            'major_id',
            'service_id',
            'user_id',
            'description'
        ]);

        /** @var Wishlist $wishlist */
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            return $this->sendError('Wishlist not found');
        }

        $wishlist = $this->wishlistRepository->update($input, $id);

        return $this->sendResponse(new WishlistResource($wishlist), 'Wishlist updated successfully');
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

        return $this->sendSuccess('Wishlist deleted successfully');
    }
}

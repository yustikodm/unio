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
        // $search = [];

        // if ($request->user_id) {
        //     $search = array_merge($search, [
        //         'user_id' => $request->user_id,    
        //     ]);
        // }

        // $wishlists = $this->wishlistRepository->paginate(15, [], $search);
        // foreach ($wishlists as $row) {            
        // }
        // return $this->sendResponse($wishlists, 'Wishlists retrieved successfully');
        $query = Wishlist::query()->where('user_id', $request->input('user_id'));

        switch ($request->input('entity_type')) {
            case 'vendors' :
                $query->where('entity_type','vendors')->with('vendor');
                break;
            case 'services':
                $query->where('entity_type','services')->with('service');
                break;
            case 'universities':
                $query->where('entity_type','universities')->with('university');
                break;
            case 'majors':
                $query->where('entity_type','majors')->with('major');
                break;
        };

        return $this->sendResponse($query->paginate(15), 'Bookmarks retrieved successfully');
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

        $query = Wishlist::query()
                        ->where('user_id', $input['user_id'])
                        ->where('entity_type', $input['entity_type'])
                        ->where('entity_id', $input['entity_id']);

        if(!empty($query)){
            return Response::json(['message' => "you've bookmarked it", "success" => false], 200);
            // return $this->sendError("you've bookmarked it");
        }

        if (!in_array($input['entity_type'], ['vendors', 'services', 'universities', 'majors'])) {
            return $this->sendError('Entity Type is Not registered!');
        }

        $wishlist = $this->wishlistRepository->create($input);

        return $this->sendResponse(new WishlistResource($wishlist), 'Bookmarked successfully');
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWishlistAPIRequest;
use App\Http\Requests\API\UpdateWishlistAPIRequest;
use App\Models\Wishlist;
use App\Models\University;
use App\Models\UniversityMajor;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\WishlistResource;
use Response;
use Illuminate\Support\Facades\DB;

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
        $search = [];

        if ($request->user_id) {

        }else{
            return $this->sendResponse([], 'Wishlists retrieved successfully');
        }
        $filter = '';
        if ($request->entity_type) {
            $filter = "WHERE entity_type = '$request->entity_type'";
        }

        $user_id = $request->input('user_id');
        $name = $request->input('name');

        $query = DB::select(
            DB::raw("SELECT * FROM (
                    SELECT w.*, j.name, j.description, j.picture, i.id detail_id, i.name detail_name FROM wishlists w 
                        JOIN vendor_services j ON j.id = w.entity_id 
                        JOIN vendors i ON i.id = j.vendor_id 
                        WHERE entity_type = 'services' AND user_id = $user_id AND j.name LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.name, j.description, j.logo picture, '' detail_id, '' detail_name FROM wishlists w 
                        JOIN vendors j ON j.id = w.entity_id 
                        WHERE entity_type = 'vendors' AND user_id = $user_id AND j.name LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.name, j.description, j.logo_src picture, '' detail_id, '' detail_name FROM wishlists w 
                        JOIN universities j ON j.id = w.entity_id 
                        WHERE entity_type = 'universities' AND user_id = $user_id AND j.name LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.name, j.description, i.logo_src picture, i.id detail_id, i.name detail_name FROM wishlists w 
                        JOIN university_majors j ON j.id = w.entity_id 
                        JOIN universities i ON i.id = j.university_id 
                        WHERE entity_type = 'university_majors' AND user_id = $user_id AND j.name LIKE '%$name%'
                    ) t $filter
            ")
        );       

        return $this->sendResponse($query, 'Bookmarks retrieved successfully');        
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
